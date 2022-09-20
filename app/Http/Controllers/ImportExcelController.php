<?php

namespace App\Http\Controllers;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ImportExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    ///by package excel
    public function export(){
        return Excel::download(new UsersExport, 'adminstaff.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function import(Request $request) 
        {  
            try{
                \Excel::import(new UsersImport, $request->file('select_users_file')); 
                return 'Users are added successfully!';                  
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                return 'invalid users';
            }          
        }

        // custom
        function importUser(Request $request)
        { 
            $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
           ]);
      
           $path = $request->file('select_file')->getRealPath();
      
           $data = \Excel::import($path)->get();
      
           if($data->count() > 0)
           {
            foreach($data->toArray() as $key => $value)
            {
             foreach($value as $row)
             {
      
              $insert_data[] = array(
               'name'  => $row[0],
               'email'   => $row[1],
               'password'   => $row[2],
              );
             }
            }
      
            if(!empty($insert_data))
            {
             DB::table('users')->insert($insert_data);
            }
           }
           return back()->with('success', 'Excel Data Imported successfully.');
        }

    public function index()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
