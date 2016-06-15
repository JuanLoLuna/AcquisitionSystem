<?php

//use App\Task;
use Illuminate\Http\Request;

/*
  Main Acquisition System Page
 */
Route::get('/', function () {
	return view('ASmain');
});

/*
Execute command URL used for buttons
*/
Route::get('/command/{commandToExecute}', function ($commandToExecute) {
	$commandToExecute=urldecode($commandToExecute);
	return exec($commandToExecute);
});

?>