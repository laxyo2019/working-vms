<?php

//Route::get('/', 'Auth\LoginController@showLoginForm');
		Route::post('/verification','OtpController@verifiction');
		Route::post('/verify_otp','OtpController@verify_otp');
		Route::get('/', 'HomeController@index')->name('home');
		Auth::routes();
		Route::match(['get', 'post'], 'register', function () {
		    return abort(403, 'Forbidden');
		})->name('register');

		Route::get('/test_notify','HomeController@test_notify');
		Route::post('/api_data', 'HomeController@api_data')->name('api_data');

Route::group(['middleware' => ['role:superadmin']], function () {
		// This Route start For RolesController

		Route::resource('/admin', 'ACL\RolesController');
		Route::get('/delete/{id}','ACL\RolesController@destroy')->name('delete');
		Route::post('/save_changes','ACL\RolesController@saveChanges')->name('saveChanges');
		// End RolesController

		// Start Permission Conroller 
		Route::resource('permissions', 'ACL\PermissionController');
		Route::get('/delete_permissions/{id}', 'ACL\PermissionController@destroy')->name('delete_permissions');
		// End Permission Conroller 

		// Start Users Conroller 
		Route::resource('/users', 'ACL\UserController');
		Route::get('/destroy/{id}', 'ACL\UserController@destroy')->name('destroy');
		Route::post('/changes_role','ACL\UserController@changesRole')->name('changesRole');
		Route::post('/changePermission','ACL\UserController@changePermission')->name('changePermission');	

		//Start AccountController
		Route::resource('/account', 'AccountController');
		Route::get('account_delete/{id}', 'AccountController@destroy')->name('account.destroy');
		//End AccountController
});

Route::group(['middleware' => ['role:account']], function () {	

		//Start FleetController
		Route::resource('/fleet','FleetController');
		Route::get('fleetdestroy/{id}','FleetController@destroy')->name('model.destroy');
		Route::post('add_on_fleet','FleetController@add_on_fleet');
		Route::get('deletefleetuser/{id}','FleetController@user_delete')->name('fleet_user.delete');
		//End FleetController

		// Start AccountUserController
		Route::resource('/accountuser','AccountUserController');
		Route::get('/destroy_accountuser/{id}', 'AccountUserController@destroy')->name('destroy.account');
		Route::post('user_add_on_fleet','AccountUserController@add_on_user'); 
		Route::post('checkAccount','AccountUserController@checkAccount');
		Route::post('AuthLogout','AccountUserController@AuthLogout');
		Route::get('/account_users', 'AccountUserController@account_user')->name('account_users');
		Route::get('account_puc_details','AccountUserController@account_puc_details')->name('account_puc_details');
		Route::get('account_rc_details','AccountUserController@account_rc_details')->name('account_rc_details');
		Route::get('account_fitness_details','AccountUserController@account_fitness_details')->name('account_fitness_details');
		Route::get('account_insurance_details','AccountUserController@account_insurance_details')->name('account_insurance_details');
		Route::get('account_permit_details','AccountUserController@account_permit_details')->name('account_permit_details');
		Route::get('account_roadtax_details','AccountUserController@account_roadtax_details')->name('account_roadtax_details');
		Route::get('account_finance_details','AccountUserController@account_finance_details')->name('account_finance_details');
		Route::get('show_finance_Detailes/{id}','AccountUserController@show_finance_Detailes')->name('show_finance_Detailes');
		Route::get('account_trip_details','AccountUserController@account_trip_details')->name('account_trip_details');
		// End AccountUserController

		//For AllDetails
		Route::get('/Alldriver','DriverdetailsController@AllDriver');

		//For Charts(Dynamic)
		Route::post('/get_chart','AccountUserController@get_chart');

		//For All ExpensesDetails
		Route::resource('/expenses_details','ExpensesDetailsController');
		Route::post('/expenses_details.show','ExpensesDetailsController@expenses_details');
});

Route::group(['middleware' => ['role:fleets']], function () {

     	//Strat Dashboard Controller
		Route::resource('/dashboard','DashboardController');
		Route::post('/fleet_ckeck','DashboardController@fleet_ckeck')->name('fleet_ckeck');
		//End Dashboard Controller

		//Start State contoller
		Route::resource('/state','StateController');
		Route::get('statedestroy/{id}','StateController@destroy')->name('state.delete');
		Route::get('/stateexport','StateController@export')->name('state.export');
		Route::post('/stateimport','StateController@import')->name('state.import');
		Route::get('/statedownload','StateController@download')->name('state.download');
		//End State Controller

		//Start City Controller
		Route::resource('/city','CityController');
		Route::get('Citydestroy/{id}','CityController@destroy')->name('city.destroy');
		Route::get('/cityexport','CityController@export')->name('city.export');
		Route::post('/cityimport','CityController@import')->name('city.import');
		Route::get('/city_ download','CityController@download')->name('city.download');
		//End City Controller

		//Start Vehicle Controller
		Route::resource('/vehicle','VehicleController');
		Route::get('Vehicledestroy/{id}','VehicleController@destroy')->name('vehicle.destroy');
		Route::get('/vehicleExport','VehicleController@export')->name('vehicle.export');
		Route::post('/import_vehicle','VehicleController@import')->name('vehicle.import');
		Route::get('/vehicleformat','VehicleController@download')->name('vehicle.download');
		//End Vehicle Controller

		//start VehiclemodelController
		Route::resource('/vehicleModel','VehiclemodelController');
		Route::get('Modeldestroy/{id}','VehiclemodelController@destroy')->name('model.destroy');
		Route::get('/modelExport','VehiclemodelController@export')->name('model.export');
		Route::post('/modelImport','VehiclemodelController@import')->name('model.import');
		Route::get('/modelformate','VehiclemodelController@download')->name('model.download');
		//End VehiclemodelController

		//Start VehicledetailsController
		Route::resource('/vehicledetails','VehicledetailsController');
		Route::post('/vehicleget','VehicledetailsController@get_model');
		Route::get('vdetails_delete/{id}','VehicledetailsController@destroy')->name('vehicledetails.destroy');
		Route::get('/vehicledetails_export','VehicledetailsController@export')->name('vehicledetails.export');
		Route::post('/vehicledetails_import','VehicledetailsController@import')->name('vehicledetails.import');
		Route::post('/updatevehicledetails_import','VehicledetailsController@updateimport')->name('updatevehicledetails.import');
		Route::get('/vehicledetails_download','VehicledetailsController@download')->name('vehicledetails.download');
		//End VehicledetailsController

		//Start DriverdetailsController
		Route::resource('/driver','DriverdetailsController');
		Route::get('/driverdelete/{id}','DriverdetailsController@destroy')->name('driverdelete');
		Route::post('/drivercity','DriverdetailsController@get_city');
		Route::get('/export','DriverdetailsController@export')->name('driver.export');
		Route::post('/import','DriverdetailsController@import')->name('driver.import');
		Route::get('/driverformat','DriverdetailsController@download')->name('driver.download');
		//End DriverdetailsController

		//Start VehicleStatusController
		Route::resource('/vch_status','VehicleStatusController');
		Route::post('/status','VehicleStatusController@store');
		//End VehicleStatusController

		//strat filtercontroller
		Route::resource('/filter','filter\FilterController');
		Route::get('/filtrdelete/{id}','filter\FilterController@destroy')->name('filter.delete');
		Route::get('/filterExport','filter\FilterController@export')->name('filter.export');
		Route::post('/filterImport','filter\FilterController@import')->name('filter.import');
		Route::get('/filterDownload','filter\FilterController@download')->name('filter.download');
		//end filtercontroller

		//strat oliChangeController
		Route::resource('/oilchange','Oilchange\OilChangeController');
		Route::get('/oildelete/{id}','Oilchange\OilChangeController@destroy')->name('oilchange.delete');
		Route::get('/oilExport','Oilchange\OilChangeController@export')->name('oilchange.export');
		Route::post('/oilImport','Oilchange\OilChangeController@import')->name('oilchange.import');
		Route::get('/oilDownload','Oilchange\OilChangeController@download')->name('oilchange.download');
		//end oliChangeController

		//strat oliChangeController
		Route::resource('/batterycharge','BatteryCharge\BatteryController');
		Route::get('/betterydelete/{id}','BatteryCharge\BatteryController@destroy')->name('batterycharge.delete');
		Route::get('/batteryExport','BatteryCharge\BatteryController@export')->name('batterycharge.export');
		Route::post('/batteryImport','BatteryCharge\BatteryController@import')->name('batterycharge.import');
		Route::get('/batteryDownload','BatteryCharge\BatteryController@download')->name('batterycharge.download');
		//end oliChangeController

		//strat PaintingController
		Route::resource('/painting','Painting\PaintingController');
		Route::get('/paintingdelete/{id}','Painting\PaintingController@destroy')->name('painting.delete');
		Route::get('/paintingExport','Painting\PaintingController@export')->name('painting.export');
		Route::post('/paintingImport','Painting\PaintingController@import')->name('painting.import');
		Route::get('/paintingDownload','Painting\PaintingController@download')->name('painting.download');
		//end PaintingController

		//strat FueltankController
		Route::resource('/fueltank','Fueltank\FueltankController');
		Route::get('/fueltankdelete/{id}','Fueltank\FueltankController@destroy')->name('fueltank.delete');
		Route::get('/fueltankExport','Fueltank\FueltankController@export')->name('fueltank.export');
		Route::post('/fueltankImport','Fueltank\FueltankController@import')->name('fueltank.import');
		Route::get('/fueltankDownload','Fueltank\FueltankController@download')->name('fueltank.download');
		//end FueltankController

		//strat KMupdateController  
		Route::resource('/kmupdate','KMupdateController');
		Route::get('/kmupdatedelete/{id}','KMupdateController@destroy')->name('kmupdate.delete');
		Route::get('/kmupdateExport','KMupdateController@export')->name('kmupdate.export');
		Route::post('/kmupdateImport','KMupdateController@import')->name('kmupdate.import');
		Route::get('/kmupdatedownload','KMupdateController@download')->name('kmupdate.download');
		//end KMupdateController

		//strat PUCDetailsController 
		Route::resource('/pucdetails','Document\PUCDetailsController');
		Route::get('/pucdetailsdelete/{id}','Document\PUCDetailsController@destroy')->name('pucdetails.delete');
		Route::get('/pucdetailsExport','Document\PUCDetailsController@export')->name('pucdetails.export');
		Route::post('/pucdetailsImport','Document\PUCDetailsController@import')->name('pucdetails.import');
		// Route::get('/pucdetailsdownload','Document\PUCDetailsController@download1')->name('pucdetails.download');
		Route::get('/pucdetl/download','Document\PUCDetailsController@download')->name('pucdetl.download');
		//end PUCDetailsController

		//strat FitnessDetailsContrller  
		
		Route::resource('/fitness','Document\FitnessDetailsController');
		Route::get('/fitnessDetailsDelete/{id}','Document\FitnessDetailsController@destroy')->name('fitness.delete');
		Route::get('/fitnessExport','Document\FitnessDetailsController@export')->name('fitness.export');
		Route::post('/fitnessDetailsImport','Document\FitnessDetailsController@import')->name('fitness.import');
		Route::get('/fitnessDetailsdownload','Document\FitnessDetailsController@download')->name('fitness.download');

		//end FitnessDetailsContrller


		//strat RoadtaxDetailsController  
		Route::resource('/roadtax','Document\RoadtaxDetailsController');
		Route::get('/roadtaxDetailsDelete/{id}','Document\RoadtaxDetailsController@destroy')->name('roadtax.delete');
		Route::get('/roadtaxExport','Document\RoadtaxDetailsController@export')->name('roadtax.export');
		Route::post('/roadtaxDetailsImport','Document\RoadtaxDetailsController@import')->name('roadtax.import');
		Route::get('/roadtaxDetailsdownload','Document\RoadtaxDetailsController@download')->name('roadtax.download');
		//end RoadtaxDetailsController

		//strat insuranceDetailsContrller
		Route::resource('/insurance','Document\InsuranceDetailsController');
		Route::get('/insuranceDelete/{id}','Document\InsuranceDetailsController@destroy')->name('insurance.delete');
		Route::get('/insuranceExport','Document\InsuranceDetailsController@export')->name('insurance.export');
		Route::post('/insuranceDetailsImport','Document\InsuranceDetailsController@import')->name('insurance.import');
		Route::get('/insuranceDetailsDownload','Document\InsuranceDetailsController@download')->name('insurance.download');
		Route::post('/getDetails','Document\InsuranceDetailsController@getDetails');
		//end insuranceDetailsContrller

		//strat StatePermitContrller 
		Route::resource('/statepermit','Document\StatePermitController');
		Route::get('/statepermitDelete/{id}','Document\StatePermitController@destroy')->name('statepermit.delete');
		Route::get('/statepermitExport','Document\StatePermitController@export')->name('statepermit.export');
		Route::post('/statepermitDetailsImport','Document\StatePermitController@import')->name('statepermit.import');
		Route::get('/statepermitDetailsDOwnload','Document\StatePermitController@download')->name('statepermit.download');
		//end StatePermitContrller

		//start RcDetailsController
		Route::resource('/rcdetails','Document\RcDetailsController');
		Route::get('/rcdetailsDelete/{id}','Document\RcDetailsController@destroy')->name('rcdetails.delete');
		Route::get('/rcdetailsExport','Document\RcDetailsController@export')->name('rcdetails.export');
		Route::post('/rcdetailsImport','Document\RcDetailsController@import')->name('rcdetails.import');
		Route::get('/rcdetailsDOwnload','Document\RcDetailsController@download')->name('rcdetails.download');
		// end RcDetailsController

		//strat TempPermitContrller 
		Route::resource('/temppermit','Document\TempPermitController');
		Route::get('/temppermitDelete/{id}','Document\TempPermitController@destroy')->name('temppermit.delete');
		Route::get('/temppermitExport','Document\TempPermitController@export')->name('temppermit.export');
		Route::post('/temppermitImport','Document\TempPermitController@import')->name('temppermit.import');
		Route::get('/temppermitDOWnload','Document\TempPermitController@download')->name('temppermit.download');
		//end TempPermitContrller

		//strat AgentContrller 
		Route::resource('/agent','AgentController');
		Route::get('/agentDelete/{id}','AgentController@destroy')->name('agent.delete');
		Route::get('/agentexport','AgentController@export')->name('agent.export');
		Route::post('/agentimport','AgentController@import')->name('agent.import');
		Route::get('/agentdownload','AgentController@download')->name('agent.download');
		//end AgentContrller

		//strat InsuranceCompanyController  
		Route::resource('/company','InsuranceCompanyController');
		Route::get('/companyDelete/{id}','InsuranceCompanyController@destroy')->name('company.delete');
		Route::get('/companyexport','InsuranceCompanyController@export')->name('company.export');
		Route::post('/companyimport','InsuranceCompanyController@import')->name('company_import');
		Route::get('/company_download','InsuranceCompanyController@download')->name('company.download');
		//end InsuranceCompanyController

		//strat InsuranceTypeController 
		Route::resource('/insurance_type','InsuranceTypeController');
		Route::get('/insurance_type_delete/{id}','InsuranceTypeController@destroy')->name('insurance_type_delete');
		Route::post('/insurance_type_export','InsuranceTypeController@import')->name('insurance_type.import');
		//end InsuranceTypeController


		//Start PetrolPumpContrller
		Route::resource('/petrolpump','Fuel\PetrolPumpController');
		Route::get('/petrolpumpDelete/{id}','Fuel\PetrolPumpController@destroy')->name('petrolpump.delete');
		Route::get('/petrolpumpExport','Fuel\PetrolPumpController@export')->name('petrolpump.export');
		Route::post('/petrolpumpImport','Fuel\PetrolPumpController@import')->name('petrolpump.import');
		Route::get('/petrolPumpDownload','Fuel\PetrolPumpController@download')->name('petrolpump.download');
		Route::post('/get_city','Fuel\PetrolPumpController@get_city')->name('petrolpump.get_city');
		//End PetrolPumpContrller

		//Statr FuelEnrtyController
		Route::resource('/fuelentry','Fuel\FuelEntryController');
		Route::get('/fuelentryDelete/{id}','Fuel\FuelEntryController@destroy')->name('fuelentry.delete');
		Route::get('/fuelentryExport','Fuel\FuelEntryController@export')->name('fuelentry.export');
		Route::post('/fuelentryImport','Fuel\FuelEntryController@import')->name('fuelentry.import');
		Route::get('/entry_download','Fuel\FuelEntryController@download')->name('fuelentry.download');
		//End FuelEntryController

		//Statr FuelBillController
		Route::resource('/fuelbill','Fuel\FuelBillController');
		Route::get('/fuelbillDelete/{id}','Fuel\FuelBillController@destroy')->name('fuelbill.delete');
		Route::get('/fuelbillExport','Fuel\FuelBillController@export')->name('fuelbill.export');
		Route::post('/fuelbillImport','Fuel\FuelBillController@import')->name('fuelbill.import');
		Route::get('/fuelbillDOwnLoaD','Fuel\FuelBillController@download')->name('fuelbill.download');
		//End FuelBillController

		//Statr FuelBillController
		Route::resource('/fuelbill','Fuel\FuelBillController');
		Route::get('/fuelbillDelete/{id}','Fuel\FuelBillController@destroy')->name('fuelbill.delete');
		Route::get('/fuelbillExport','Fuel\FuelBillController@export')->name('fuelbill.export');
		Route::post('/fuelbillImport','Fuel\FuelBillController@import')->name('fuelbill.import');
		Route::get('/fuelbillDOwnLoaD','Fuel\FuelBillController@download')->name('fuelbill.download');
		//End FuelBillController 

		//Statr SpareTypeController
		Route::resource('/sparetype','Spare\SpareTypeController');
		Route::get('/sparetypeDelete/{id}','Spare\SpareTypeController@destroy')->name('sparetype.delete');
		Route::get('/sparetypeExport','Spare\SpareTypeController@export')->name('sparetype.export');
		Route::post('/sparetypeImport','Spare\SpareTypeController@import')->name('sparetype.import');
		Route::get('/download_sparetype','Spare\SpareTypeController@download')->name('sparetype.download');
		//End SpareTypeController

		//Statr SpareTypeController 
		Route::resource('/spareunit','Spare\SpareUnitController');
		Route::get('/spareunitDelete/{id}','Spare\SpareUnitController@destroy')->name('spareunit.delete');
		Route::get('/spareunitExport','Spare\SpareUnitController@export')->name('spareunit.export');
		Route::post('/spareunitImport','Spare\SpareUnitController@import')->name('spareunit.import');
		Route::get('/spareunitDOwnLoaD','Spare\SpareUnitController@download')->name('spareunit.download');
		//End SpareTypeController

		//Statr SpareCompanyController 
		Route::resource('/sparecompany','Spare\SpareCompanyController');
		Route::get('/sparecompanyDelete/{id}','Spare\SpareCompanyController@destroy')->name('sparecompany.delete');
		Route::get('/sparecompanyExport','Spare\SpareCompanyController@export')->name('sparecompany.export');
		Route::post('/sparecompanyImport','Spare\SpareCompanyController@import')->name('sparecompany.import');
		Route::get('/sparecompanyDOwnLoaD','Spare\SpareCompanyController@download')->name('sparecompany.download');
		//End SpareCompanyController

		//Statr SpareMasterController 
		Route::resource('/sparemaster','Spare\SpareMasterController');
		Route::get('/sparemasterDelete/{id}','Spare\SpareMasterController@destroy')->name('sparemaster.delete');
		Route::get('/sparemasterExport','Spare\SpareMasterController@export')->name('sparemaster.export');
		Route::post('/sparemasterImport','Spare\SpareMasterController@import')->name('sparemaster.import');
		Route::get('/sparemasterDOwnLoaD','Spare\SpareMasterController@download')->name('sparemaster.download');
		Route::post('/sparemaster_suppliers','Spare\SpareMasterController@suppliers')->name('sparemaster.suppliers');
		//End SpareMasterController

		//Statr SpareVendorController  
		Route::resource('/sparevendor','Spare\SpareVendorController');
		Route::get('/sparevendorDelete/{id}','Spare\SpareVendorController@destroy')->name('sparevendor.delete');
		Route::get('/sparevendorExport','Spare\SpareVendorController@export')->name('sparevendor.export');
		Route::post('/sparevendorImport','Spare\SpareVendorController@import')->name('sparevendor.import');
		Route::get('/sparevendorDOwnLoaD','Spare\SpareVendorController@download')->name('sparevendor.download');
		Route::post('/sparevendor_get_city','Spare\SpareVendorController@get_city')->name('sparevendor.get_city');

		//End SpareVendorController

		//Statr TyreCompanyController 
		Route::resource('/tyrecompany','Tyre\TyreCompanyController');
		Route::get('/tyrecompanyDelete/{id}','Tyre\TyreCompanyController@destroy')->name('tyrecompany.delete');
		Route::get('/tyrecompany_export','Tyre\TyreCompanyController@export')->name('tyrecompany.export');
		Route::post('/tyrecompany_import','Tyre\TyreCompanyController@import')->name('tyrecompany.import');
		Route::get('/tyre_download','Tyre\TyreCompanyController@download')->name('tyrecompany.download');
		//End TyreCompanyController

		//Statr TyreModelController 
		Route::resource('/tyremodel','Tyre\TyreModelController');
		Route::get('/tyremodelDelete/{id}','Tyre\TyreModelController@destroy')->name('tyremodel.destroy');
		Route::get('/tyremodel_export','Tyre\TyreModelController@export')->name('tyremodel.export');
		Route::post('/tyremodel_import','Tyre\TyreModelController@import')->name('tyremodel.import');
		Route::get('/tyremodel_DOwnLoaD','Tyre\TyreModelController@download')->name('tyremodel.download');
		//End TyreModelController

		//Statr TyreVendorController  
		Route::resource('/tyrevendor','Tyre\TyreVendorController');
		Route::get('/tyrevendorDelete/{id}','Tyre\TyreVendorController@destroy')->name('tyrevendor.delete');
		Route::get('/tyrevendorExport','Tyre\TyreVendorController@export')->name('tyrevendor.export');
		Route::post('/tyrevendorImport','Tyre\TyreVendorController@import')->name('tyrevendor.import');
		Route::get('/tyrevendorDOwnLoaD','Tyre\TyreVendorController@download')->name('tyrevendor.download');
		Route::post('/tyrevendor_get_city','Tyre\TyreVendorController@get_city')->name('tyrevendor.get_city');

		//End TyreVendorController

		// start Tyre MaterialRequestController
		Route::resource('/tyre_material_request','Tyre\MaterialRequestController');
		Route::post('/material_request_details','Tyre\MaterialRequestController@type_details')->name('material_request_details');
		Route::post('/material_request_com','Tyre\MaterialRequestController@type_comp')->name('material_request_com');
		Route::get('/material_request_delete/{id}','Tyre\MaterialRequestController@delete')->name('tyre_material_delete');
		//end  Tyre MaterialRequestController

		// start Tyre PurchaseOrderController
		Route::resource('/tyre_purchase','Tyre\PurchaseOrderController');
		Route::post('/purchase_save','Tyre\PurchaseOrderController@save')->name('purchase_save');
		Route::post('/update_purchase_save','Tyre\PurchaseOrderController@update_purchase_save')->name('update_purchase_save');
		Route::post('/get_type','Tyre\PurchaseOrderController@get_type')->name('get_type');
		Route::post('/get_mtr_no','Tyre\PurchaseOrderController@get_mtr_no')->name('purchase_mtr_no');
		Route::post('/purchase_get_mtr_list','Tyre\PurchaseOrderController@get_mtr_list')->name('pur_mtr_list');
		Route::post('/order_save','Tyre\PurchaseOrderController@save_session')->name('tyre_purchase_order_save');
		Route::post('/order_remove','Tyre\PurchaseOrderController@remove_session')->name('tyre_purchase_order_remove');
		// end Tyre PurchaseOrderControlle

		// Strat GRNController
		Route::resource('/tyre_grn','Tyre\GrnController');
		//End GRNController

		// Strat TyreRemolding Controller
		Route::resource('/tyre_remolding','Tyre\RemoldingController');
		//End TyreRemoldingController

		// Strat TyreRemoldingReturnController
		Route::resource('/tyre_remolding_return','Tyre\TyreRemoldingReturnController');
		//End TyreRemoldingReturnController

		// Start Tyre StockController
		Route::resource('/tyre_stock','Tyre\StockController');
		// end Tyre StockController

		//Statr TyreTypeController  
		Route::resource('/tyretype','Tyre\TyreTypeController');
		Route::get('/tyretypeDelete/{id}','Tyre\TyreTypeController@destroy')->name('tyretype.delete');
		Route::get('/tyretypeExport','Tyre\TyreTypeController@export')->name('tyretype.export');
		Route::post('/tyretype_Import','Tyre\TyreTypeController@import')->name('tyretype.import');
		Route::get('/tyretypeDOwnLoaD','Tyre\TyreTypeController@download')->name('tyretype.download');
		//End TyreTypeController

		//Start MaterialRequestController  
		Route::resource('/material_request','Spare\MaterialRequestController');
		Route::get('/material_delete/{id}','Spare\MaterialRequestController@destroy')->name('material.delete');
		Route::get('/material_export','Spare\MaterialRequestController@export')->name('material.export');
		Route::post('/material_import','Spare\MaterialRequestController@import')->name('material.import');
		Route::get('/material_download','Spare\MaterialRequestController@download')->name('material.download');
		Route::post('/get_type_rec','Spare\MaterialRequestController@get_type_rec')->name('material.get_type_rec');
		Route::post('/save_in_session','Spare\MaterialRequestController@save_in_session')->name('material.save_in_session');
		Route::post('/show_model','Spare\MaterialRequestController@show_model')->name('material.show_model');
		Route::post('/remove_item','Spare\MaterialRequestController@remove_session')->name('material.remove_session');
		//End MaterialRequestController

		//Statr PurchaseOrderController  
		Route::resource('/purchase_order','Spare\PurchaseOrderController');
		Route::get('/purchase_delete/{id}','Spare\PurchaseOrderController@destroy')->name('purchase.delete');
		Route::get('/purchase_order_export','Spare\PurchaseOrderController@export')->name('purchase.export');
		Route::post('/purchase_order_import','Spare\PurchaseOrderController@import')->name('purchase.import');
		Route::get('/purchase_order_downLoad','Spare\PurchaseOrderController@download')->name('purchase.download');
		Route::post('/purchase_record','Spare\PurchaseOrderController@get_type_rec')->name('purchase.get_type_rec');
		Route::post('/purchase_model','Spare\PurchaseOrderController@show_model')->name('purchase.model');
		Route::post('/gte_mtr_no','Spare\PurchaseOrderController@get_mtr_no')->name('purchase.mtr_no');
		Route::post('/get_mtr_list','Spare\PurchaseOrderController@get_mtr_list')->name('purchase.get_mtr_list');
		Route::post('/purchase_order_session','Spare\PurchaseOrderController@save_in_session')->name('purchase.purchase_order_session');
		Route::post('/purchase_order_remove','Spare\PurchaseOrderController@remove_session')->name('purchase.purchase_order_remove');
		//End PurchaseOrderController

		// Start ExpensesEntryController
		Route::resource('/expanses_entry','Expenses\ExpensesEntryController');
		Route::post('/entry_save','Expenses\ExpensesEntryController@save_session')->name('expense_entry_save');
		Route::post('/entry_remove','Expenses\ExpensesEntryController@remove_entry_session')->name('expense_entry_remove');
		// End ExpensesEntryController

		// Start ExpensesPaymentEntryController
		Route::resource('/expanses_payment_entry','Expenses\ExpensesPaymentEntryController');   
		Route::get('/delete/{id}','Expenses\ExpensesPaymentEntryController@destroy')->name('delete');   
		Route::post('/get_details','Expenses\ExpensesPaymentEntryController@get_details')->name('get_details');   
		// End ExpensesPaymentEntryController

		// Start AccidentEntryController
		Route::resource('/accident_entry','Expenses\AccidentEntryController');   
		Route::get('/remove/{id}','Expenses\AccidentEntryController@delete')->name('accident_entry_delete');   
		// End AccidentEntryController

		// Start ExpensesReportController
		Route::resource('/expenses_report','Expenses\ExpensesReportController');   
		Route::post('/vehicle_report','Expenses\ExpensesReportController@vehicle_report')->name('vehicle_report');
		Route::post('/vehicle_party_report','Expenses\ExpensesReportController@vehicle_party_report')->name('vehicle_party_report');
		Route::post('/vehicle_yearly_report','Expenses\ExpensesReportController@vehicle_yearly_report')->name('vehicle_yearly_report');
		Route::post('/accident_report','Expenses\ExpensesReportController@accident_report')->name('accident_report');   
		// End ExpensesReportController

		// Start VehicleFinanceController
		Route::resource('/vehiclefinance','finance\VehiclefinanceController');
		Route::post('/customer_city_edit','finance\VehiclefinanceController@city');
		Route::get('/vehiclefinance_destroy/{id}','finance\VehiclefinanceController@destroy')->name('vehiclefinance_destroy');
		Route::post('/vehiclefinance_import','finance\VehicleFinanceController@import')->name('vehiclefinance.import');
		// End VehicleFinanceController

		// Start VehicleReportController
		Route::resource('/vehiclereport','finance\VehicleReportController');
		Route::post('/vehicle_installment','finance\VehicleReportController@vehicle_installment')->name('vehicle_installment');
		Route::post('/vehicle_finance_installment','finance\VehicleReportController@vehicle_finance_installment')->name('vehicle_finance_installment');
		// End VehicleReportController

		// Start PartyTypeController
		Route::resource('/expense_type','Expenses\ExpensesTypeController');
		Route::post('/add_expense','Expenses\ExpensesTypeController@add_expense_in_expense');
		Route::post('/add_expense_in_party','Expenses\ExpensesTypeController@add_expense_in_party');
		Route::get('/expense_type_delete/{id}','Expenses\ExpensesTypeController@destroy');
		// End PartyTypeController

		// Start PartyController
		Route::resource('/party','Expenses\PartyController');
		Route::get('/party_delete/{id}','Expenses\PartyController@destroy');
		// End PartyController

		// Start PartyController
		Route::resource('/expanses','Expenses\ExpensesController');
		Route::post('/get_vch_avg','Expenses\ExpensesController@get_vch_avg')->name('get_vch_avg');
		// End PartyController

		// Start VehicleTripController
		Route::resource('/Trip','Trip\VehicleTripController');
		Route::get('/Trip.destroy/{id}','Trip\VehicleTripController@destroy');
		Route::post('/vch_status_get','Trip\VehicleTripController@vch_status_get');
		Route::post('/get_state','Trip\VehicleTripController@get_state');
		// End VehicleTripController
});
