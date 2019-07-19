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
Route::get('login/estudiante',function(){
    return view('citas.agendar_cita');
})->name('loginEstudiante');

Route::get('cita/estudiante/{id}','CitaController@estudiante');

//Citas
Route::post('estudiante/dashboard','CitaController@estudiante')->name('loginEstudiante');
Route::get('citas/estudiante/contraseña','CitaController@editNuevaContraseña')->name('estudianteContraseña');
Route::post('citas/estudiante/Actualizarcontrasena','CitaController@updateContrasena')->name('actualizarContraseña');
Route::get('citas/estudiante/agendar','CitaController@cita')->name('agendar');
Route::post('citas/estudiante/agendar','CitaController@agendar')->name('agendarcita');
Route::get('citas/estudiante/citas','CitaController@historialCitas')->name('citas');
Route::get('citas/estudiante/citasAgendadas','CitaController@citasAgnedadas');
Route::post('citas/estudiante/cancelarCita','CitaController@cancelarCita');


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
Route::resource('periodoa','PeriodoacademicoController');
Route::delete('periodoa/delete/{id}','PeriodoacademicoController@destroy');



