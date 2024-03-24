<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Log;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return view('persons.index', compact('persons'));       
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('persons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! $request->hasFile('xmlfile')) {
            return redirect('/xmlupload')->withErrors(['A fájl feltöltése nem sikeres!']); 
        }
        if (! $request->file('xmlfile')->isValid()) {
            return redirect('/xmlupload')->withErrors(['A fájl hibás!']); 
        } 
        
        try {
            $parsedXmlObj = simplexml_load_file($request->file('xmlfile'));
        } catch (\Throwable $e ) {
            $parsedXmlObj = FALSE;
        }
    
        if ($parsedXmlObj === FALSE) {
            return redirect('/xmlupload')->withErrors(['Ez az xml fájl hibás!']); 
        }

        if (! is_object($parsedXmlObj->person)) {
            return redirect('/xmlupload')->withErrors(['Ez az xml fájl nem tartalmaz személyi adatokat!']); 
        }
        
        $newrecords = 0;
        $notsavedrecords = 0;
        $SuccessResults = array();
        $ErrorResults = array();

        foreach( $parsedXmlObj->person as $OpElement ) {

            $outMsg = $OpElement->teljesnev . " (" . $OpElement->azonosito . ", " . $OpElement->adoazonositojel .") rögzítése ";

            if ($this->tryToSavePerson( $OpElement )) { 
                $newrecords++;
                $SuccessResults[] = $outMsg . " sikeres";
            } else {
                $notsavedrecords++;
                $ErrorResults[] = $outMsg . " sikertelen (már létező rekord)";
            }
        }

        $SuccessResults[] = "Sikeres feldolgozás. Új rekord: $newrecords, Már létező / nem mentett rekordok: $notsavedrecords";
 
        return redirect('/xmlupload')->withErrors($ErrorResults)->with("messages", $SuccessResults); 
    }



    private function tryToSavePerson( $OpElement ) {

        $FilteredData = array(
            'person_id' => intval($OpElement->azonosito),
            'tax_number' => intval(trim(str_replace('-', '', $OpElement->adoazonositojel))),
            'full_name' => trim($OpElement->teljesnev),
            'other_id' => intval($OpElement->egyebid),
            'entry_date' => str_replace('.', '-', $OpElement->belepes),
            'leave_date' => str_replace('.', '-', $OpElement->kilepes),
            'email_address' => trim($OpElement->emailcim),
        );

        //print_r( $OpElement);
        try {
            $person = new Person([
                'person_id' => $FilteredData['person_id'],
                'tax_number' => $FilteredData['tax_number'],
                'full_name' => $FilteredData['full_name'],
                'other_id' => $FilteredData['other_id'],
                'entry_date' => $FilteredData['entry_date'],
                'leave_date' => $FilteredData['leave_date'],
                'email_address' => $FilteredData['email_address'],

            ]);

            $person->save();
            $PersonSaved = 1;
        } catch (\Illuminate\Database\QueryException $e) {
            $PersonSaved = 0;
        }

        $log = new Log([
            'person_id' => $FilteredData['person_id'],
            'tax_number' => $FilteredData['tax_number'],
            'full_name' => $FilteredData['full_name'],
            'other_id' => $FilteredData['other_id'],
            'entry_date' => $FilteredData['entry_date'],
            'leave_date' => $FilteredData['leave_date'],
            'email_address' => $FilteredData['email_address'],

            'insert_status' => ($PersonSaved) ? "successful" : "failed",  
        ]);
        $log->save();

        return $PersonSaved;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
		$person = Person::where('person_id', $id)->first();
		if(is_null($person)){
		   return abort(404);
		}
        return view('persons.show', compact('person'));
    }

 
}
