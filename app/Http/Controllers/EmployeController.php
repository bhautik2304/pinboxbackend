<?php

namespace App\Http\Controllers;

use App\Models\employe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response(["employes" => employe::all()], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, employe $employe)
    {
        //
        $employe->EMPNO = rand(1111, 9999);
        $employe->FIRSTNME = $req->FIRSTNME;
        $employe->MIDINIT = $req->MIDINIT;
        $employe->LASTNAME = $req->LASTNAME;
        $employe->WORKDEPT = $req->WORKDEPT;
        $employe->PHONENO = $req->PHONENO;
        $employe->HIREDATE = $req->HIREDATE;
        $employe->JOB = $req->JOB;
        $employe->EDLEVEL = $req->EDLEVEL;
        $employe->SEX = $req->SEX;
        $employe->BIRTHDATE = $req->BIRTHDATE;
        $employe->SALARY = $req->SALARY;
        $employe->BONUS = $req->BONUS;
        $employe->COMM = $req->COMM;
        $res = $employe->save();
        if (!$res) {
            # code...
            return response(["msg" => "$req->FIRSTNME Not Created Error Acurd", "code" => 0], 200);
        }
        return response(["msg" => "$employe->FIRSTNME Created Successfully", "code" => 1], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req,employe $empl,$id)
    {
        //
        $employes = $empl->find($id);
        $emp = $empl->find($id)->update([
            "FIRSTNME" => $req->FIRSTNME,
            "MIDINIT" => $req->MIDINIT,
            "LASTNAME" => $req->LASTNAME,
            "WORKDEPT" => $req->WORKDEPT,
            "PHONENO" => $req->PHONENO,
            "HIREDATE" => $req->HIREDATE,
            "JOB" => $req->JOB,
            "EDLEVEL" => $req->EDLEVEL,
            "SEX" => $req->SEX,
            "BIRTHDATE" => $req->BIRTHDATE,
            "SALARY" => $req->SALARY,
            "BONUS" => $req->BONUS,
            "COMM" => $req->COMM,
        ]);
        if (!$emp) {
            # code...
            return response(["msg" => "Employe Name $req->FIRSTNME Not Updated,, Something Went Wrong", "code" => 0], 200);
        }
        return response(["msg" => "Employe Name $empl->FIRSTNME Updated Successfully", "code" => 1], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employe $emp, $id)
    {
        //
        $employes = $emp->find($id);
        // dd($employes);
        $employe = $emp->find($id)->destroy($id);
        if (!$employe) {
            # code...
            return response(["msg" => "Employe Name $employes->FIRSTNME Not Deleted, Something Went Wrong", "code" => 0], 200);
        }

        return response(["msg" => "Employe Name $employes->FIRSTNME Deleted Successfully", "code" => 1], 200);

    }
}
