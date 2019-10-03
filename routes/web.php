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
Route::get('users','GruposUsuariosController@index')->name('users');//renombrar
Route::resource('usuarios','UsuarioController');
Route::resource('paginas','PaginaController');
Route::resource('modulos','ModuloController');
Route::resource('grupos','Grupo_UsuarioController');
Route::get('privilegios','Grupo_UsuarioController@showPrivilegios')->name('privilegios');
Route::get('privilegios/paginas/{id}','Grupo_UsuarioController@searhPaginas');
Route::post('privilegios/paginas','Grupo_UsuarioController@guardarPaginas');
Route::get('usuario/perfil','UsuarioController@profile')->name('perfil_Usuario');
Route::get('usuario/cambiar_password','UsuarioController@cambiarPasswordShow')->name('nuevoPassword');
Route::post('usuario/cambiar_password/finalizar','UsuarioController@updatePassword')->name('updateContrasenia');//validando la contraseña actual
Route::post('usuario/cambiar_password_2/finalizar','UsuarioController@updatePassword2')->name('actualizarContrasnia');//sin validar la contraseña solo se envia la nueva contraseña
Route::post('usuarios/operaciones','UsuarioController@operaciones')->name('operaciones');
Route::post('usuarios/update/{id}','UsuarioController@updateUser')->name('updateUser');

//psicologos_gestion
Route::get('dashboard_psicologo','HomeController@indexPsicologo')->name('dashboard_psicologo');
Route::resource('psicologos','PsicologoController');
Route::get('horarios/{id}','PsicologoController@horarios');

//Docentes de permanencia
Route::resource('docentes_permanencia','DocentePermanenciaController');

//estudiantes
Route::resource('estudiantes','EstudianteController');
Route::post('estudiantes/save','EstudianteController@save')->name('estudiantes_save');
Route::get('estudiante/{id}','EstudianteController@consultarEstudiante');

//correo a contacto
Route::post('mensageIndividual','MessageController@store');

//citas
//login
Route::get('login/estudiante',function(){
    return view('citas.agendar_cita');
})->name('loginEstudiante');
//logout cierre de session estudiante
Route::get('logout/esudiante',function (){
    session()->put('estudiante');
    return redirect('login/estudiante');
})->name('logoutStudent');

Route::get('cita/estudiante/{id}','CitaController@estudiante');

//Citas
Route::post('estudiante/dashboard','CitaController@estudiante')->name('loginEstudiante')
    ->middleware('authStudent');
Route::get('citas/estudiante/contraseña','CitaController@editNuevaContraseña')
    ->name('estudianteContraseña')
    ->middleware('authStudent');
Route::post('citas/estudiante/Actualizarcontrasena','CitaController@updateContrasena')
    ->name('actualizarContraseña')
    ->middleware('authStudent');
Route::get('citas/estudiante/agendar','CitaController@cita')
    ->name('agendar')
    ->middleware('authStudent');
Route::post('citas/estudiante/agendar','CitaController@agendar')->name('agendarcita');
Route::get('citas/estudiante/citas','CitaController@historialCitas')
    ->name('citas')
    ->middleware('authStudent');
Route::get('citas/estudiante/citasAgendadas','CitaController@citasAgnedadas')
          ->middleware('authStudent');
Route::get('citas/citasTotales','CitaController@citasTotales');
Route::post('citas/estudiante/cancelarCita','CitaController@cancelarCita');
Route::get('citas/tallerista/','CitaController@citasTallerista')->name('citas_agendadas');
Route::Post('citas/cambiar_estado','CitaController@cambiarEstado')->name('cambiar_estado');


//Intervenciones Individuales
Route::resource('seguimientos','SeguimientoController');
Route::resource('intervenciones_individuales','IntervencionIndividualController');
Route::get('reporte/intervencion_individual/{id}','IntervencionIndividualController@pdfIntervencionIndividual')->name('pdf_intervencion_individual');

//reportes
Route::get('reportes/intervencion_individual','ReportesController@reporteIntervencionIndividual')->name('reporte_individual');
Route::get('reportes/intervencion_general','ReportesController@reporteIntervencionIndividualGeneral')->name('reportes_Generales');
Route::get('reportes/Estudiantes','ReportesController@reporte_Estudiante')->name('reporte_Estudiante');
Route::get('reportes/Impresiones/{programa}/{periodo}','ReportesController@reporte_periodo')->name('reporte_impresion');

Route::get('reportes/Periodos','ReportesController@getDatos')->name('periodo_datos');
Route::get('reportes/Impresion_Diagnostica','ReportesController@reporteImpresionDiagnostica')->name('reporte_Diagnostico');

//periodo Academico
Route::resource('periodoa','PeriodoacademicoController')->middleware('auth');
Route::delete('periodoa/delete/{id}','PeriodoacademicoController@destroy');



