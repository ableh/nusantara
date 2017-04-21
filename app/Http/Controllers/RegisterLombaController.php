<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Uid;

use App\RegisterLomba;

use App\Participant;

use App\Level;

class RegisterLombaController extends Controller
{

    public function Register(Request $request)
    {
    	$uid = md5(time());
    	$object_uid = new Uid;
    	$object_uid->uid = $uid;

    	$object_uid->save();

    	$peserta_loma = new Participant;
    	$peserta_loma->participant_name = $request->participant_name;
    	$peserta_loma->name_of_parent = $request->parent_name;
    	$peserta_loma->uid = $object_uid->id;

        $peserta_loma->save();
    	
    	$register = new RegisterLomba;
    	$register->group_name = $request->group_name;
    	$register->name_school = $request->name_school;
        $register->level = $request->level;
    	$register->address = $request->address;
    	$register->name_pic = $request->name_pic;
    	$register->phone_number = $request->phone_number;
    	$register->email = $request->email;
    	$register->kabupaten = $request->kabupaten;
    	$register->provinsi = $request->provinsi;
    	$register->uid = $object_uid->id;	

    	if ($register->save()) {

    		$res['success'] = true;
    		$res['message'] = 'Success Register Lomba';
            $res['uid'] = $object_uid->uid;
            $res['data'] = $register;
    		
    		return response($res);
    		
    	} else{
    		$res['success'] = false;
    		$res['message'] = 'Failid Register Lomba';
    		
    		return response($res);
    		
    	}
    }

    public function getLevel(Request $request)
    {
        $level = Level::all();

            $res['success'] = true;
            $res['message'] = 'Message';
            $res['data'] = $level;
        
            return response($res);
        
    }

}

