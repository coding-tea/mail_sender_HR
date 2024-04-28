@extends('layouts.layout')

@section('title', 'dashboard')
@section('content')

    <div class="container mx-auto">
        <div class="w-full">
            <div class="flex items-center justify-between gap-4 mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="bg-white rounded-md shadow-md p-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-800">Welcome Back!</h3>
                        <button type="button" class="flex items-center gap-2 rounded-full bg-blue-500 px-4 py-2 text-white">
                            <i class="fa fa-sign-out-alt"></i>
                            Sign out
                        </button>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-500"></div>
                            <div>
                                <p class="text-sm font-bold text-gray-800">Osamah</p>
                                <p class="text-xs text-gray-600">osamah@example.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-4 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white rounded-md shadow-md p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-800">Revenue</h3>
                            <p class="text-sm text-gray-600">40K increase</p>
                        </div>
                        <div class="mt-4">
                            <div class="chart">
                                <canvas id="revenue-chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-md shadow-md p-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-bold text-gray-800">New customers</h3>
                            <p class="text-sm text-red-600">5% decrease</p>
                        </div>
                        <div class="mt-4">
                            <div class="chart">
                                <canvas id="new-customers-chart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection