<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absen;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }
    public function index()
    {

        $this->timeZone('Asia/Makassar');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $cek_absen = Absen::where(['user_id' => $user_id, 'date' => $date])
            ->get()
            ->first();
        if (is_null($cek_absen)) {
            $info = array(
                "status" => "Anda belum mengisi absensi!",
                "btnIn" => "",
                "btnOut" => "disabled",
                "alert" => "alert alert-danger"
            );
        } elseif ($cek_absen->time_out == NULL && $time >= "16:00:00") {
            $info = array(
                "status" => "Absen Pulang!",
                "btnIn" => "disabled",
                "btnOut" => "",
                "alert" => "alert alert-info"
            );
        } elseif ($cek_absen->time_out == NULL) {
            $info = array(
                "status" => "Jangan lupa absen pulang jam 16.00",
                "btnIn" => "disabled",
                "btnOut" => "disabled",
                "alert" => "alert alert-warning"
            );
        } else {
            $info = array(
                "status" => "Absensi Hari ini selesai!",
                "btnIn" => "disabled",
                "btnOut" => "disabled",
                "alert" => "alert alert-success"
            );
        }

        $data_absen = Absen::where('user_id', $user_id)
            ->orderBy('date', 'desc')
            ->get();
        if (Auth::user()->level === "pembimbing") {
            return redirect('/konfirmasi');
        } else {
            return view('home', compact('data_absen', 'info'));
        }
    }

    public function konfirmasi()
    {
        $data_absen = Absen::orderBy('created_at', 'desc')->get();
        return view('konfirmasi', compact('data_absen'));
    }

    public function absen(Request $request)
    {
        $this->timeZone('Asia/Makassar');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d"); // 2017-02-01
        $time = date("H:i:s"); // 12:31:20
        $note = $request->note;

        $absen = new Absen;

        // absen masuk
        if (isset($request->btnIn)) {
            // cek double data
            $cek_double = $absen->where(['date' => $date, 'user_id' => $user_id])
                ->count();
            if ($cek_double > 0) {
                return redirect()->back();
            }
            $absen->create([
                'user_id' => $user_id,
                'date' => $date,
                'time_in' => $time,
                'note' => $note
            ]);
            return redirect()->back();
        }
        // absen keluar
        elseif (isset($request->btnOut)) {
            $absen->where(['date' => $date, 'user_id' => $user_id])
                ->update([
                    'time_out' => $time,
                    'note' => $note
                ]);
            return redirect()->back();
        }
        return $request->all();
    }

    public function status(Request $request)
    {
        $user_id = $request->user_id;
        $absen = Absen::where(['user_id' => $user_id])->update([
            'status' => $request->status,
        ]);
        return redirect()->back();
    }
}
