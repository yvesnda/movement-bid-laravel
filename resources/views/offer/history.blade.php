<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 12:26
 */
?>
@extends('layouts.main')
@section('title',__('Create Offer'))
@section('body')
<div class="col-12">
    <h2>Histories</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Required Date</th>
            <th>Location</th>
            <th>Destination</th>
            <th>Status</th>
            <th>Successor</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offers as $offer)
            <tr>
                <td>{{$offer->required_date}}</td>
                <td>{{$offer->location}}</td>
                <td>{{$offer->destination}}</td>
                <td>{{ucfirst($offer->status)}}</td>
                <td>{{$offer->user->name}}</td>
                <td><a href="{{route('offers.show',['offer'=>$offer->id])}}" class="btn btn-primary">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    @endsection
