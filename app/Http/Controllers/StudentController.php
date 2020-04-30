<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{

	public function AllStudenetMethod(){
    	$student = Student::all();
    	return view('student.all_students',compact('student'));

    }


    public function StudentCreateMethod(){
    	return view('student.create');
    }


    public function StoreStudenetMethod(Request $request){

    	$validatedData = $request->validate([
        'name' => 'required|max:25|min:3',
        'phone' => 'required|unique:students|max:20|min:11',
        'email' => 'required|unique:students',
        ]);

        //Insert with Eloquent ORM
        $student = new Student ;

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();
        if($student){
        	$notification = array(
    			'message'=>'Student Data Inserted Successfully.',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
    	}else{
    		$notification = array(
    			'message'=>'Something Went Wrong!',
    			'alert-type'=>'error'
    		);
    		return Redirect()->back()->with($notification);
    	}


    }

   

    public function ViewStudenetMethod($id){

   //DB::table('students')->where('id',$id)->first();
    	$student = Student::findorfail($id);

    	return view('student.view_student',compact('student'));
    }


    

    public function EditStudenetMethod($id){
    	$student = Student::findorfail($id);

    	
    	return view('student.edit_student',compact('student'));
    }


    public function UpdateStudenetMethod(Request $request,$id){

    	$student = Student::findorfail($id);

    	$student->name = $request->name;
    	$student->email = $request->email;
    	$student->phone = $request->phone;

    	$student->save();

    	$notification = array(
    			'message'=>'Student Data Updated Successfully.',
    			'alert-type'=>'success'
    		);
    		return Redirect()->route('all.student')->with($notification);

    }

    public function DeleteStudenetMethod($id){

    	//DB::table('students')->where('id',$id)->delete();

    	$student = Student::findorfail($id);
    	$student->delete();

    	$notification = array(
    			'message'=>'Student Data Deleted Successfully.',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);

    }





}
