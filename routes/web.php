<?php

use Illuminate\Support\Facades\Route;





//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/','HomeController@home')->name('index');
Route::get('/about','HomeController@about')->name('about');
Route::get('/contact','HomeController@contact')->name('contact');
Route::post('/contact/inquiry-save','HomeController@contactInquiry')->name('contact.inquiry');
Route::get('/faq','HomeController@faq')->name('faq');
Route::get('/tutors','HomeController@tutors')->name('tutors');
Route::get('/tutor-detail/{slug}','HomeController@tutorDetail')->name('tutorDetail');

Route::get('/dashboard','HomeController@dashboard')->name('return.login')->middleware('auth');
/*======================================================================
                            ADMIN ROUTES
======================================================================*/

Route::get('admin/login', 'Admin\AdminLoginController@adminIndexLogin')->name('admin.index.login');
Route::post('admin/login', 'Admin\AdminLoginController@AdminAttemptLogin')->name('admin.attempt.login');

Route::prefix('admin')->name('admin.')->middleware('admin')->namespace('Admin')->group(function() {

    Route::get('/dashboard', 'AdminLoginController@dashboard')->name('dashboard');
    Route::get('profile', 'AdminProfileController@profile')->name('profile');
    Route::post('update-profile', 'AdminProfileController@updateProfile')->name('update.profile');


    Route::resources([
        'roles'     => 'RoleController',
        'teams'     => 'TeamController',
    ]);
    Route::get('teams/remove/{id?}', 'TeamController@remove')->name('teams.remove');

    Route::get('tutors','TutorController@tutors')->name('tutors');
    Route::get('add/tutor','TutorController@add')->name('add.tutor');
    Route::post('tutors/store','TutorController@store')->name('tutor.store');
    Route::post('tutors/update','TutorController@update')->name('tutor.update');
    Route::post('tutors/salary/update','TutorController@salaryUpdate')->name('tutor.salary.update');
    Route::get('tutor/delete/{id?}','TutorController@delete')->name('tutor.delete');
    Route::post('tutor/block','TutorController@block')->name('tutor.block');
    Route::post('tutor/reject','TutorController@reject')->name('tutor.reject');
    Route::get('tutor/unblock/{id?}','TutorController@unblock')->name('tutor.unblock');
    Route::get('tutor/detail/{id?}','TutorController@detail')->name('tutors.detail');
    Route::get('tutor/edit/{id?}','TutorController@edit')->name('tutors.edit');
  Route::get('student/chats','StudentController@showChat')->name('show.chat');


    Route::get('students','StudentController@students')->name('students');
    Route::get('student/ticket/{id?}','StudentController@ticket')->name('student.ticket');
      Route::post('ticket/response/{id?}','StudentController@ticketResponse')->name('ticket.response');
    // Route::post('ticket/response','StudentController@tickresponse')->name('ticket.response');
    Route::get('student/delete/{id?}','StudentController@delete')->name('student.delete');
    Route::post('student/block','StudentController@block')->name('student.block');
    Route::get('student/unblock/{id?}','StudentController@unblock')->name('student.unblock');
    Route::post('student/reject/{id?}','StudentController@reject')->name('student.reject');
    Route::post('student/assign/tutor','StudentController@assignTutor')->name('student.assign.tutor');
    Route::post('student/update/tutor','StudentController@changeTutor')->name('student.update.tutor');

    Route::get('student/inquiries','InquiryController@list')->name('student.inquiries');
    Route::get('student/inquiry-delete/{id?}','InquiryController@delete')->name('student.inquiries.delete');
    Route::get('student/inquiry-detail/{id?}/{student}','InquiryController@detail')->name('student.inquiries.detail');
    Route::post('student/inquiry-status/update','InquiryController@statusUpdate')->name('student.inquiries.status.update');
    Route::post('student/inquiry/update','InquiryController@inquiryUpdate')->name('student.inquiries.update');
    Route::post('student/set-trial','InquiryController@setTrial')->name('student.inquiries.set.trial');
    Route::post('student/set-class/schedule','InquiryController@setClassSchedule')->name('student.inquiries.set.schedule');
    Route::post('student/update-class/schedule','InquiryController@updateClassSchedule')->name('student.inquiries.schedule.update');

    Route::get('student/schedule/requests','InquiryController@scheduleRequest')->name('inquiries.schedules');
    Route::get('student/schedule/detail/{id?}/{name}','InquiryController@scheduleRequestDetail')->name('inquiries.schedules.detail');


    Route::get('student/schedules/today','ZoomController@todaySessions')->name('sessions.today');
    Route::post('start/class','ZoomController@startClass')->name('start.class');


    Route::get('pending/payments','PaymentController@pendingPayments')->name('pending.payments');
    Route::get('approve/payment/{id}','PaymentController@approvePayment')->name('approve.payment');
    Route::get('payment/receipt/{id}','PaymentController@paymentReceipt')->name('invoice.receipt');

    Route::get('testimonials','TestimonialController@list')->name('testimonials');
    Route::get('testimonial/add','TestimonialController@add')->name('testimonials.add');
    Route::post('testimonial/save','TestimonialController@store')->name('testimonials.save');
    Route::get('testimonial/delete/{id}','TestimonialController@delete')->name('testimonials.delete');
    Route::get('settings/', 'SettingController@index')->name('setting.index');
    Route::get('setting/meta-tags', 'SettingController@metaTags')->name('setting.meta.tags');
    Route::post('settings/update', 'SettingController@update')->name('setting.update');


});


/*======================================================================
                            TUTOR ROUTES
======================================================================*/

Route::prefix('tutor')->name('tutor.')->middleware('tutor')->namespace('Tutor')->group(function(){

    Route::get('dashboard','ProfileController@dashboard')->name('dashboard');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile-update','ProfileController@update')->name('profile.update');


    Route::post('set/trail-class','ScheduleController@setTrial')->name('set.trail.class');
    Route::post('start-class','ZoomController@startClass')->name('start.class');
});



/*======================================================================
                            STUDENT ROUTES
======================================================================*/

Route::prefix('student')->name('student.')->middleware('student')->namespace('Student')->group(function(){

    Route::get('dashboard','ProfileController@dashboard')->name('dashboard');
    Route::get('profile','ProfileController@profile')->name('profile');
    Route::post('profile-update','ProfileController@update')->name('profile.update');
    Route::get('add-inquiry','InquiryController@newInquiry')->name('add.inquiry');
    Route::post('inquiry-store','InquiryController@dashboardInquiryStore')->name('inquiry.store');
    Route::get('inquiry-detail/{id?}/{name}','InquiryController@detail')->name('inquiry.detail');
    Route::post('inquiry-reject','InquiryController@rejectInquiry')->name('inquiry.reject');
    Route::get('inquiry-continue','InquiryController@continueInquiry')->name('inquiry.continue');
    Route::get('inquiry-cancel','InquiryController@cancelInquiry')->name('inquiry.cancel');
    Route::get('inquiries','InquiryController@inquiries')->name('inquiries');
    Route::get('payment/invoice/{id}','InvoiceController@invoice')->name('inquiry.payment.invoice');
    Route::get('payment/invoice/download/{id}','InvoiceController@invoiceDownload')->name('invoice.receipt');
    Route::post('payment/pay','InvoiceController@pay')->name('payment.paid');
    Route::get('payments','InvoiceController@payments')->name('payments');
    Route::get('chat','ChatController@chat')->name('chat');
     Route::post('chat-send','ChatController@chatSend')->name('chat.send');
     Route::get('chat/tickets','ChatController@studentTickets')->name('chat.ticket');



});





Route::post('/inquiry-store','Student\InquiryController@store')->name('inquiry.store');
Route::get('/thankyou','Student\InquiryController@thankyou')->name('thankyou');

Route::get('/zoom-checking','Admin\ZoomController@checking');
