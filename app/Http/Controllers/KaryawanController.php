<?php

namespace App\Http\Controllers;

use App\Models\Karyawan; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() : View
    {
        $karyawans = Karyawan::latest()->paginate(10);

        return view('karyawans.index', compact('karyawans'));
    }

    public function create(): View
    {
        return view('karyawans.create');
    }


    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nip'           => 'required|numeric|min:8',
            'nama'          => 'required|min:2',
            'alamat'        => 'required|min:10',
            'jenis_kelamin' => 'required|min:5',
            'jabatan'       => 'required|min:5'
        ]);

        //create karyawan
        Karyawan::create([
            'nip'            => $request->nip,
            'nama'           => $request->nama,
            'alamat'         => $request->alamat,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'jabatan'        => $request->jabatan
        ]);

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);

        //render view with karyawan
        return view('karyawans.edit', compact('karyawan'));
    }

    public function show(string $id): View
    {
        //get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);

        //render view with karyawan
        return view('karyawans.show', compact('karyawan'));
    }
        
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nip'             => 'required|numeric|min:8',
            'nama'            => 'required|min:2',
            'alamat'          => 'required|min:10',
            'jenis_kelamin'   => 'required|min:5',
            'jabatan'         => 'required|min:5'
        ]);

        //get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);

            $karyawan->update([
                'nip'            => $request->nip,
                'nama'           => $request->nama,
                'alamat'         => $request->alamat,
                'jenis_kelamin'  => $request->jenis_kelamin,
                'jabatan'        => $request->jabatan
            ]);

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

        /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        //get karyawan by ID
        $karyawan = Karyawan::findOrFail($id);

        //delete karyawan
        $karyawan->delete();

        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
