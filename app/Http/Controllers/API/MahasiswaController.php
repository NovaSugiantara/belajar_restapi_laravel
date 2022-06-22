<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Helpers\ApiFormatter;
use Exception;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show Data
        $data = Mahasiswa::all();
        if ($data) {
            return ApiFormatter::createdApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createdApi(400, 'Error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Add Data
        try {
            //code...
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);

            $mahasiswa = Mahasiswa::create([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = Mahasiswa::where(
                'id',
                '=',
                $mahasiswa->id
            )->get();

            if ($data) {
                return ApiFormatter::createdApi(200, 'Success Insert data', $data);
            } else {
                return ApiFormatter::createdApi(400, 'Error');
            }
        } catch (Exception $error) {
            //throw $th;
            return ApiFormatter::createdApi(400, 'Error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Details
        $data = Mahasiswa::findOrFail($id);
        if ($data) {
            return ApiFormatter::createdApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createdApi(400, 'Error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Update Data
        try {
            //code...
            $request->validate([
                'username' => 'required',
                'address' => 'required',
            ]);

            $mahasiswa = Mahasiswa::where('id', $id)->update([
                'username' => $request->username,
                'address' => $request->address
            ]);
            $data = Mahasiswa::where('id', $id)->get();
            if ($mahasiswa) {
                
                return ApiFormatter::createdApi(200, 'Success Update Data', $data);
            } else {
                return ApiFormatter::createdApi(400, 'Error');
            }
        } catch (Exception $error) {
            //throw $th;
            return ApiFormatter::createdApi(400, 'Error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hapus data
        try {
            //code...
            $mahasiswa = Mahasiswa::findOrFail($id);
            $data = $mahasiswa->delete();
            if ($data) {
                return ApiFormatter::createdApi(200, 'Success Delete Data');
            } else {
                return ApiFormatter::createdApi(400, 'Error');
            }
        } catch (Exception $error) {
            //throw $th;
            return ApiFormatter::createdApi(400, 'Error');
        }
    }
    
}
