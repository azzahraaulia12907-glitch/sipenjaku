<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeachingTeamController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LecturerController;

/* Dashboard */
Route::get('/', [ScheduleController::class, 'index'])->name('dashboard');

/* Course */
Route::get('courses/upload', [CourseController::class, 'uploadForm'])->name('courses.uploadForm');
Route::post('courses/upload', [CourseController::class, 'upload'])->name('courses.upload');
Route::resource('courses', CourseController::class);

/* Department */
Route::get('departments/upload', [DepartmentController::class, 'uploadForm'])->name('departments.uploadForm');
Route::post('departments/upload', [DepartmentController::class, 'upload'])->name('departments.upload');
Route::resource('departments', DepartmentController::class);

/* Teaching Team */
Route::get('teaching_teams/upload', [TeachingTeamController::class, 'uploadForm'])->name('teaching_teams.uploadForm');
Route::post('teaching_teams/upload', [TeachingTeamController::class, 'upload'])->name('teaching_teams.upload');
Route::resource('teaching_teams', TeachingTeamController::class);

/* Room */
Route::get('rooms/upload', [RoomController::class, 'uploadForm'])->name('rooms.uploadForm');
Route::post('rooms/upload', [RoomController::class, 'upload'])->name('rooms.upload');
Route::resource('rooms', RoomController::class);

/* Lecturer */
Route::get('lecturers/upload', [LecturerController::class, 'uploadForm'])->name('lecturers.uploadForm');
Route::post('lecturers/upload', [LecturerController::class, 'upload'])->name('lecturers.upload');
Route::resource('lecturers', LecturerController::class);

/* User */
Route::resource('users', UserController::class);

/* Schedule */
Route::resource('schedules', ScheduleController::class);