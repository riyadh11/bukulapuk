<?php
$title="BUKULAPUK-PROFIL";
$page_title="Profil";
$page_desc="Ubah Profilmu Disini!";
?>
@extends('layouts.member.master')
@section('content')
{{ Form::open(array('id'=>'addProductsForm','url'=>'/member/profile/update', 'files' => true)) }}
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                                <div class="profile-detail card-box">
                                    <div>
                                        <img src="/assets/images/users/{{$Member->Bio->img}}" class="rounded-circle" alt="profile-image">

                                        <ul class="list-inline status-list m-t-20">
                                            <li class="list-inline-item">
                                                <h3 class="text-primary m-b-5">{{$Member->Product->count()}}</h3>
                                                <p class="text-muted">Buku</p>
                                            </li>

                                            <li class="list-inline-item">
                                                <h3 class="text-success m-b-5">{{$Member->Order->count()}}</h3>
                                                <p class="text-muted">Transaksi</p>
                                            </li>
                                        </ul>

                                        <hr>
                                        <h4 class="text-uppercase font-18 font-600">About Me</h4>
                                        <p class="text-muted font-13 m-b-30">
                                           {{$Member->Bio->TagLine}}
                                        </p>

                                        <div class="text-left">
                                            <p class="text-muted font-13"><strong>Nama&ensp;:</strong> <span class="m-l-15">{{$Member->name}}</span></p>

                                            <p class="text-muted font-13"><strong>E-Mail&ensp;:</strong><span class="m-l-15">{{$Member->email}}</span></p>

                                            <p class="text-muted font-13"><strong>Telp&ensp;:</strong><span class="m-l-15">{{$Member->Member_Address->first()->telp}}</span></p>

                                            <p class="text-muted font-13"><strong>Alamat&ensp;:</strong> <span class="m-l-15">{{$Member->Member_Address->first()->alamat}}</span></p>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-9 col-md-8">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">Nama</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" value ="{{$Member->name}}" disabled>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">Username</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" value ="{{$Member->username}}" disabled>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">Tag Line</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" name="tagline" value="{{$Member->Bio->TagLine}}" required>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">Alamat</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" name="alamat" value="{{$Member->Member_Address->first()->alamat}}" required>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">No Telepon</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="text" class="form-control" placeholder="" name="telp" value="{{$Member->Member_Address->first()->telp}}" required>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <br>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 col-sm-2 col-lg-2 control-label">Avatar</label>
                                                <div class="col-sm-9 col-md-9 col-lg-9">
                                                    <input type="file" id="image" name="avatar">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-md-offset-9 col-sm-offset-9 col-sm-offset-9">
                                            <button type="submit" class="btn w-sm btn-success waves-effect waves-light" id="sa-save">Save</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
{{ Form::close() }}
@endsection