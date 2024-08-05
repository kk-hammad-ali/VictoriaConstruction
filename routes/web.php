<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\OurServicesController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentPanelController;
use App\Http\Controllers\FlatController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\RentalAppointmentController;


// Route::get('/', function () {
//     return view('public.index');
// })->name('home');

Route::get('/', function () {
    return view('admin.dashboard');
})->name('home');


// Admin
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');


// Clients
Route::get('admin/all/clients', [ClientController::class, 'adminAllClient'])->name('admin.all_client');
Route::get('admin/add-client', [ClientController::class, 'adminAddClient'])->name('admin.add_client');
Route::get('admin/edit-client/{id}', [ClientController::class, 'edit'])->name('admin.edit_client');
Route::get('agent/all/clients', [ClientController::class, 'agentAllClient'])->name('agent.all_client');
Route::get('agent/add-client', [ClientController::class, 'agentAddClient'])->name('agent.add_client');

// Agents
Route::get('admin/all/agents', [AgentController::class, 'index'])->name('admin.all_agent');
Route::get('admin/add-agent', [AgentController::class, 'adminAddAgent'])->name('admin.add_agent');
Route::post('admin/store-agent', [AgentController::class, 'store'])->name('admin.store_agent');
Route::get('admin/edit-agent/{id}', [AgentController::class, 'editAgent'])->name('admin.edit_agent');
Route::put('admin/update-agent/{id}', [AgentController::class, 'update'])->name('admin.update_agent');
Route::delete('admin/delete-agent/{id}', [AgentController::class, 'destroy'])->name('admin.delete_agent');

// Properties
Route::get('admin/all/properties', [PropertyController::class, 'index'])->name('admin.all_property');
Route::get('admin/add-property', [PropertyController::class, 'adminAddProperty'])->name('admin.add_property');
Route::post('admin/store-property', [PropertyController::class, 'store'])->name('admin.store_property');
Route::get('admin/edit-property/{id}', [PropertyController::class, 'editProperty'])->name('admin.edit_property');
Route::post('admin/update-property/{id}', [PropertyController::class, 'update'])->name('admin.update_property');
Route::delete('admin/delete-property/{id}', [PropertyController::class, 'destroy'])->name('admin.delete_property');

// Flats
Route::get('admin/all/flat', [FlatController::class, 'index'])->name('admin.all_flat');
Route::get('admin/add-flat', [FlatController::class, 'adminAddFlat'])->name('admin.add_flat');
Route::post('admin/store-flat', [FlatController::class, 'store'])->name('admin.store_flat');
Route::get('admin/edit-flat/{id}', [FlatController::class, 'editFlat'])->name('admin.edit_flat');
Route::put('admin/update-flat/{id}', [FlatController::class, 'update'])->name('admin.update_flat');
Route::delete('admin/delete-flat/{id}', [FlatController::class, 'destroy'])->name('admin.delete_flat');

// Agent
Route::get('agent/dashboard', [AgentPanelController::class, 'index'])->name('agent.dashboard');


// PUBLIC
Route::get('our-work', [OurWorkController::class, 'index'])->name('public.our_work');
Route::get('our-services', [OurServicesController::class, 'index'])->name('public.our_services');
Route::get('about-us', [AboutUsController::class, 'index'])->name('public.about_us');


//Our Team
Route::get('our-team', [OurTeamController::class, 'index'])->name('public.our_team');
Route::post('application', [OurTeamController::class, 'store'])->name('public.store_application');
Route::get('admin/applied-applications', [OurTeamController::class, 'allapplications'])->name('ourteam.applied_application');

//Rental Appointment
Route::get('rental-appointment', [RentalAppointmentController::class, 'index'])->name('rental.appointment');
Route::post('rental-appointment', [RentalAppointmentController::class, 'store'])->name('rental.appointment.store');
Route::get('admin/all-rental-appointments', [RentalAppointmentController::class, 'allRentalAppointments'])->name('admin.extra.all_rental_appointments');
