@extends('layouts.app')
@section('content')
    <div class="text-gray-900">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Users
            </h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>
                <tr class="border-b">
                    <th class="text-left p-3 px-5">Name</th>
                    <th class="text-left p-3 px-5">Email</th>
                    <th class="text-left p-3 px-5">Role</th>
                    <th></th>
                </tr>
                @foreach($users as $user)
                <tr class="border-b hover:bg-orange-100 bg-gray-100">
                    <td class="p-3 px-5">{{$user->name}}</td>
                    <td class="p-3 px-5">{{$user->email}}</td>
                    <td class="p-3 px-5">
                        @if($user->admin)
                            Admin
                        @else Customer
                        @endif
                    </td>
                    <td class="p-3 px-5 flex justify-end">
                        <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection