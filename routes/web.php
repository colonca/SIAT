<?php


//login
Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest')->name('/');
Route::get('login', 'Auth\LoginController@ShowLoginForm');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard','HomeController@index')->name('dashboard');

//loaders
Route::get('loaders/index','LoaderExcelController@index')->name('loaders');
Route::get('loaders/estudiantes','LoaderExcelController@viewEstudiantes')->name('loaderEstudiantes');
Route::get('loaders/asignaturas','LoaderExcelController@viewAsignaturas')->name('loaderAsignaturas');
Route::post('loaders/estudiantes','LoaderExcelController@loadEstudiantes')->name('loaderestudiante');


//usuarios
Route::get('users','GruposUsuariosController@index')->name('users');
Route::resource('usuarios','UsuarioController');
Route::resource('paginas','PaginaController');
Route::resource('modulos','ModuloController');
Route::resource('grupos','Grupo_UsuarioController');
Route::get('privilegios','Grupo_UsuarioController@showPrivilegios')->name('privilegios');
Route::get('privilegios/paginas/{id}','Grupo_UsuarioController@searhPaginas');
Route::post('privilegios/paginas','Grupo_UsuarioController@guardarPaginas');


//psicologos
Route::resource('psicologos','PsicologoController');
Route::get('horarios/{id}','PsicologoController@horarios');


//estudiantes
Route::resource('estudiantes','EstudianteController');
//correo a contacto
Route::post('mensageIndividual','MessageController@store');

//citas
Route::get('estudiante/login',function(){
    return view('citas.agendar_cita');
});
Route::get('cita/estudiante/{id}','CitaController@estudiante');


//psicologos 
Route::get('dashboard_psicologo','HomeController@indexPsicologo')->name('dashboard_psicologo');
Route::post('estudiante/dashboard','CitaController@estudiante')->name('loginEstudiante');
Route::get('citas/estudiante/contraseña','CitaController@editNuevaContraseña')->name('estudianteContraseña');
Route::post('citas/estudiante/Actualizarcontrasena','CitaController@updateContrasena')->name('actualizarContraseña');
Route::get('citas/estudiante/agendar','CitaController@cita')->name('agendar');
Route::post('citas/estudiante/agendar','CitaController@agendar')->name('agendarcita');

Route::get('citas/estudiante/citas','CitaController@historialCitas')->name('citas');
