<?php
/**
 * Created by PhpStorm.
 * User: Yves
 * Date: 15/11/2020
 * Time: 09:14
 */
?>
@extends('layouts.main')
@section('title',__('Create Offer'))
@section('body')
    <h2>Offer Description</h2>
    <table class="table table-striped">
        <tbody>
        <tr><td>Required Date</td><td>{{$offer->required_date}}</td>
        <tr><td>Type</td><td>{{$offer->type}}</td>
        <tr><td>Location</td><td>{{$offer->location}}</td>
        <tr><td>Destination</td><td>{{$offer->destination}}</td>
        <tr><td>Measure</td><td>{{$offer->measure}}</td>
        <tr><td>Mass</td><td>{{$offer->mass}}</td>
        <tr><td>Description</td><td>{{$offer->description}}</td>
        </tbody>
    </table>
    @if($offer->status==='open')
    <h2>Biddings</h2>
    <table class="table table-striped">
        <tbody>
        @foreach($offer->bids as $bid)
            <tr><td>{{$bid->user->name}}</td>
                <td>{{$bid->amount}} RWF</td>
                <td>{{$bid->description}}</td>
                @if($offer->user->id==request()->user()->id)
                <td>
                        <a href="{{route('offer.close',['bid'=>$bid->id])}}" class="btn btn-primary" >Mark Success</a>
                </td>
                @endif
            </tr>
        @endforeach
        @if($offer->user->id!=request()->user()->id)
        <tr><td colspan="3">
                <form action="{{route('bids.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="offer_id" value="{{$offer->id}}"/>
                    @include('components.input',['label'=>'Amount','type'=>'number','value'=>'amount'])
                    <textarea name="description"></textarea>
                    <button class="btn btn-primary">Place a Bid</button>
                </form>
            </td></tr>
            @endif
        </tbody>
    </table>
    @endif
    @if($offer->status==='closed'&&$offer->success_bid_id)
        <h2>Successor Information</h2>
        <table class="table table-striped">
            <tbody>
            <tr><td>Name</td><td>{{$offer->user->name}}</td></tr>
            <tr><td>Email</td><td>{{$offer->user->email}}</td></tr>
            <tr><td>Phone</td><td>{{$offer->user->telephone}}</td></tr>
            </tbody>
        </table>
    @endif
@endsection