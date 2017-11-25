<?php
$m = new Market;
$m->name = 'Winter Garden Market';
$m->save();

$data = ['name' => 'Winter Garden Market', 'city' => 'Winter Garden'];
Market::create($data);

$m = Market::find(3);

$markets = Market::all();

$markets = Market::where('city', 'Orlando')->get();

$markets = Market::where('city', 'Orlando')
	->orderBy('name', 'desc')
	->take(5)
	->get();
	

$m = Market::find(3);
$m->name = 'Winter Garden CO-Op Market';
$m->save();

$data = [
	'name' => 'Winter Garden Co-Op Market',
	'website' => 'wgcoop.com'
];
$m->fill($data);


$m->delete();
Market::destroy(3);
Market::destroy([3,4,5]);


class MArket extends Model
{
	public function scopeOrlando($query)
	{
		return $query
			->where('city', 'Orlando')
			->orderBy('name', 'desc');
	}
}

$orlandoMarkets = Market::orlando()->get();

?>

<!-- resources/views/farms/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>Farm To Market</title></head>
<body>
@php
	$market = Market::find(3);
@endphp	
	<h1>{{ $market->name }}</h1>
	<h3>{{ $market->city }}</h3>
	Website:
	<a href="{{ $market->website }}">{{ $market->website }}</a>
</body>
</html>


<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head><title>Farm To Market</title></head>
<body>
	@yield('main')
</body>
</html>

<!-- resources/views.markets/index.blade.php -->
@extends('layouts.app')
@section('main')
	@php
		$markets = Market::all();
	@endphp	
	@foreach ($markets as $market)
		<a href="{{ $market->website }}"><h2>{{ $market->website }}</h2></a>
	@endforeach
@endsection

<?php
// app/Http/Controllers/MarketController.php

namespace App/Http/Controllers;

use App/Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
	public function index()
	{
		$markets = Market::all();
		return view('markets.index', ['markets' => $markets]);
	}
	
	public function show(Market $market)
	{
		return view('markets.show', ['market' => $market]);
	}
}
?>

<?php

// routes/web.php

Route::get('/', function () {
	return "G'day world";
});

Route::get('markets/{id}', function ($id) {
	return "Requested market id = $id";
});

Route::get('/', 'MarketController@index');
Route::get('markets', 'marketController@index');

/*
@create
@store
@show
@edit
@update
@destroy
*/

Route::resource('markets', 'MarketsController');

/*
	GET index
	GET create
	POST store
	DELETE destroy
	PUT/PATCH update
	GET show
	GET edit
*/


