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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HistoryController;


Route::get('/admin/get-properties/{agentId}', [ClientController::class, 'getProperties'])->middleware('admin')->name('admin.get_properties');
Route::get('/client/get-properties/{agentId}', [ClientController::class, 'getProperties'])->middleware('agent')->name('client.get_properties');
Route::get('/admin/get-flats/{propertyId}', [ClientController::class, 'getFlats'])->middleware('admin')->name('admin.get_flats');
Route::get('/agent/get-flats/{propertyId}', [ClientController::class, 'getFlats'])->middleware('agent')->name('agent.get_flats');
Route::post('/admin/pay-rent', [ClientController::class, 'payRent'])->middleware('admin')->name('admin.pay_rent');


Route::get('/admin/history', [HistoryController::class, 'showHistory'])->middleware('admin')->name('admin.showHistory');




// Route for sending received invoice
Route::get('/send-received-invoice/{clientId}', [MailController::class, 'sendReceivedInvoice'])
    ->middleware('admin')
    ->name('admin.sendReceivedInvoice');

// Route for generating received invoice
Route::get('/admin/generate-received-invoice/{clientId}', [MailController::class, 'generateReceivedInvoice'])
    ->name('admin.generateReceivedInvoice');

// Route for viewing received invoice
Route::get('/admin/view-received-invoice/{clientId}', [MailController::class, 'viewReceivedInvoice'])
    ->name('admin.viewReceivedInvoice');

// Route for sending not received invoiceP
Route::get('/send-not-received-invoice/{clientId}', [MailController::class, 'sendNotReceivedInvoice'])
    ->middleware('admin')
    ->name('admin.sendNotReceivedInvoice');

// Route for generating not received invoice
Route::get('/admin/generate-not-received-invoice/{clientId}', [MailController::class, 'generateNotReceivedInvoice'])
    ->name('admin.generateNotReceivedInvoice');

// Route for viewing not received invoice
Route::get('/admin/view-not-received-invoice/{clientId}', [MailController::class, 'viewNotReceivedInvoice'])
    ->name('admin.viewNotReceivedInvoice');




Route::get('/logoutadmin', [AdminController::class, 'adminLogout'])->middleware('admin')->name('adminlogout');

Route::get('/logoutagent', [AgentController::class, 'agentLogout'])->middleware('agent')->name('agentlogout');


Route::get('/', function () {
    return view('public.index');
})->name('home');

Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/', function () {
    //     return view('admin.dashboard');
    // })->name('home');


    // Admin
Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware('admin')->name('admin.dashboard');


// Clients
Route::get('admin/all/unpaid-clients', [ClientController::class, 'adminUnpaidClient'])->middleware('admin')->name('admin.unpaid_client');
Route::get('admin/all/paid-clients', [ClientController::class, 'adminPaidClient'])->middleware('admin')->name('admin.paid_client');

Route::get('admin/add-client', [ClientController::class, 'adminAddClient'])->middleware('admin')->name('admin.add_client');
Route::post('/admin/add-client', [ClientController::class, 'storeClient'])->middleware('admin')->name('admin.store_client');

Route::get('admin/edit-client/{id}', [ClientController::class, 'edit'])->middleware('admin')->name('admin.edit_client');
Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('admin.destroy_client');
Route::post('/admin/clients/{id}', [ClientController::class, 'update'])->name('admin.update_client');
// Route::get('/admin/clients/{id}/edit', [ClientController::class, 'edit'])->name('admin.edit_client');

Route::get('admin/all/clients', [ClientController::class, 'adminAllClient'])->middleware('admin')->name('admin.all_client');
Route::get('agent/all/clients', [ClientController::class, 'agentAllClient'])->middleware('agent')->name('agent.all_client');
Route::get('agent/add-client', [ClientController::class, 'agentAddClient'])->middleware('agent')->name('agent.add_client');
Route::post('/agent/add-client', [ClientController::class, 'agentStoreClient'])->middleware('agent')->name('agent.store_client');
Route::get('agent/all/unpaid-clients', [ClientController::class, 'agentUnpaidClient'])->middleware('agent')->name('agent.unpaid_client');
Route::get('agent/all/paid-clients', [ClientController::class, 'agentPaidClient'])->middleware('agent')->name('agent.paid_client');

// Agents
Route::get('admin/all/agents', [AgentController::class, 'index'])->middleware('admin')->name('admin.all_agent');
Route::get('admin/add-agent', [AgentController::class, 'adminAddAgent'])->middleware('admin')->name('admin.add_agent');
Route::post('admin/store-agent', [AgentController::class, 'store'])->middleware('admin')->name('admin.store_agent');
Route::get('admin/edit-agent/{id}', [AgentController::class, 'editAgent'])->middleware('admin')->name('admin.edit_agent');
Route::put('admin/update-agent/{id}', [AgentController::class, 'update'])->middleware('admin')->name('admin.update_agent');
Route::delete('admin/delete-agent/{id}', [AgentController::class, 'destroy'])->middleware('admin')->name('admin.delete_agent');

// Properties
Route::get('admin/all/properties', [PropertyController::class, 'index'])->middleware('admin')->name('admin.all_property');
Route::get('admin/add-property', [PropertyController::class, 'adminAddProperty'])->middleware('admin')->name('admin.add_property');
Route::post('admin/store-property', [PropertyController::class, 'store'])->middleware('admin')->name('admin.store_property');
Route::get('admin/edit-property/{id}', [PropertyController::class, 'editProperty'])->middleware('admin')->name('admin.edit_property');
Route::post('admin/update-property/{id}', [PropertyController::class, 'update'])->middleware('admin')->name('admin.update_property');
Route::delete('admin/delete-property/{id}', [PropertyController::class, 'destroy'])->middleware('admin')->name('admin.delete_property');

// Flats
Route::get('admin/all/flat', [FlatController::class, 'index'])->middleware('admin')->name('admin.all_flat');
Route::get('admin/add-flat', [FlatController::class, 'adminAddFlat'])->middleware('admin')->name('admin.add_flat');
Route::post('admin/store-flat', [FlatController::class, 'store'])->middleware('admin')->name('admin.store_flat');
Route::get('admin/edit-flat/{id}', [FlatController::class, 'editFlat'])->middleware('admin')->name('admin.edit_flat');
Route::put('admin/update-flat/{id}', [FlatController::class, 'update'])->middleware('admin')->name('admin.update_flat');
Route::delete('admin/delete-flat/{id}', [FlatController::class, 'destroy'])->middleware('admin')->name('admin.delete_flat');

// Agent
Route::get('agent/dashboard', [AgentPanelController::class, 'index'])->middleware('agent')->name('agent.dashboard');

Route::get('admin/applied-applications', [OurTeamController::class, 'allapplications'])->middleware('admin')->name('ourteam.applied_application');
Route::get('admin/all-rental-appointments', [RentalAppointmentController::class, 'allRentalAppointments'])->middleware('admin')->name('admin.extra.all_rental_appointments');

// PUBLIC
Route::get('our-work', [OurWorkController::class, 'index'])->name('public.our_work');
Route::get('our-services', [OurServicesController::class, 'index'])->name('public.our_services');
Route::get('about-us', [AboutUsController::class, 'index'])->name('public.about_us');
Route::get('login', [LoginController::class, 'index'])->name('public.login');


//Our Team
Route::get('our-team', [OurTeamController::class, 'index'])->name('public.our_team');
Route::post('application', [OurTeamController::class, 'store'])->name('public.store_application');

//Rental Appointment
Route::get('rental-appointment', [RentalAppointmentController::class, 'index'])->name('rental.appointment');
Route::post('rental-appointment', [RentalAppointmentController::class, 'store'])->name('rental.appointment.store');
