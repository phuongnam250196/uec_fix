<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace'=>'TrangChu'], function() {

	// public
	Route::group(['prefix'=>'dangnhap'], function() {
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});
	Route::get('/logout2', 'LoginController@getLogoutx');

	Route::get('/', 'FrontendController@getHome');

	Route::get('gioithieu', 'FrontendController@getGioithieu');
	Route::get('huongdoanhnghiep', 'FrontendController@getHuongDN');
	Route::get('dinhhuongnghe', 'FrontendController@getDinhhuongnghe');
	Route::get('dinhhuongnghe/{id}', 'FrontendController@getDinhhuongngheChitiet');
	Route::get('jobfair', 'FrontendController@getJobfair');
	Route::get('jobfair/{id}', 'FrontendController@getJobfairChitiet');
	Route::get('lienhe', 'FrontendController@getLienhe');
	Route::get('thongtinsinhvien', 'FrontendController@getThongtinsinhvien');
	// Route::get('/tin/{id}', 'FrontendController@getThongtinsinhvien');


	Route::group(['prefix'=>'khaosat'], function() {
		Route::get('sinhvien', 'FrontendController@getKSsinhvien');
		Route::post('sinhvien', 'FrontendController@postKSsinhvien');
		
		Route::get('cuusinhvien', 'FrontendController@getKScuusinhvien');
	});

	Route::group(['prefix'=>'khoadaotao'], function() {
		Route::get('/', 'FrontendController@getKhoadaotao');
		Route::get('/{id}', 'FrontendController@getKhoadaotaoChitiet');
	});

	Route::group(['prefix'=>'baiviet'], function() {
		Route::get('/', 'FrontendController@getBaiviet');
		Route::get('/{id}', 'FrontendController@getBaivietChitiet');
	});

	Route::group(['prefix'=>'timviec'], function() {
		Route::get('/', 'FrontendController@getTimviec');
		Route::get('/{id}', 'FrontendController@getTimviecChitiet');
	});

	Route::group(['prefix'=>'doanhnghiep'], function() {
		Route::get('/', 'FrontendController@getDoanhnghiepPub');
		Route::get('/chitiet/{id}', 'FrontendController@getDoanhnghiepChitiet');
		Route::get('/{slug}', 'FrontendController@getDoanhnghiepKhuvuc');
	});

	// private

	// Doanh nghiệp private
	Route::group(['prefix'=>'enterprise', 'middleware'=>['checkLogoutAll', 'testabc']], function() {
		Route::get('/', 'EnterpriseController@getDoanhnghiepPri');
		Route::get('/info/{id}', 'EnterpriseController@getDNInfo');
		Route::get('/change_password/{id}', 'EnterpriseController@getResetpassword');
		Route::post('/change_password/{id}', 'EnterpriseController@postResetpassword');
		Route::get('/update_info/{id}', 'EnterpriseController@getDNInfoEdit');
		Route::post('/update_info/{id}', 'EnterpriseController@postDNInfoEdit');
		// Route::post('/update_info/{id}', 'EnterpriseController@UploadImg');

		Route::get('/list_kdt', 'EnterpriseController@getListKdt');
		Route::get('/add_kdt', 'EnterpriseController@getAddKdt');
		Route::post('/add_kdt', 'EnterpriseController@postAddKdt');
		Route::get('/edit_kdt/{id}', 'EnterpriseController@getEditKdt');
		Route::post('/edit_kdt/{id}', 'EnterpriseController@postEditKdt');
		Route::get('/delete_kdt/{id}', 'EnterpriseController@getDeleteKdt');
		Route::get('/detail_kdt/{id}', 'EnterpriseController@getKdtDetail');

		Route::get('/list_ttd', 'EnterpriseController@getListTtd');
		Route::get('/add_ttd', 'EnterpriseController@getAddTtd');
		Route::post('/add_ttd', 'EnterpriseController@postAddTtd');
		Route::get('/edit_ttd/{id}', 'EnterpriseController@getEditTtd');
		Route::post('/edit_ttd/{id}', 'EnterpriseController@postEditTtd');
		Route::get('/delete_ttd/{id}', 'EnterpriseController@DeleteTtd');
		Route::get('/detail_ttd/{id}', 'EnterpriseController@getDetailTtd');
		// Route::post('/detail_ttd', 'EnterpriseController@postDetailTtd');

		Route::get('/cv', 'EnterpriseController@getCV');
		Route::get('/cv_detail/{id}', 'EnterpriseController@getCVDetail');
		Route::post('/cv_detail/{id}', 'EnterpriseController@postCVDetail');
		Route::post('/cv_detail2/{id}', 'EnterpriseController@postCVDetail2');

		Route::get('/report', 'EnterpriseController@getReport');
	});

	// Nhà trường private
	Route::group(['prefix'=>'school', 'middleware'=>['checkLogoutAll','chekcNT']], function() {
		Route::get('/', 'SchoolController@getSchoolPri');
		Route::get('/info', 'SchoolController@getSchooInfo');
		Route::get('/change_password', 'SchoolController@getSchooChangepassword');
		Route::post('/change_password', 'SchoolController@postSchooChangepassword');

		Route::get('/reset_password', 'SchoolController@getSchooResetpassword');
		Route::post('/reset_password', 'SchoolController@postSchooResetpassword');

		Route::get('/update_info', 'SchoolController@getSchooInfoEdit');
		Route::post('/update_info', 'SchoolController@postSchooInfoEdit');

		Route::get('/update_student/{id}', 'SchoolController@getSchoolStudent');
		Route::post('/update_student/{id}', 'SchoolController@postSchoolStudent');

		Route::get('/update_work', 'SchoolController@getSchoolStudentWork');
		Route::post('/update_work', 'SchoolController@postSchoolStudentWork');

		Route::get('/sinh_vien', 'SchoolController@getTaikhoanSV');

		Route::get('/del_student/{id}', 'SchoolController@getTaikhoanSVDelete');
		Route::get('/report', 'SchoolController@getReportSchool');
		Route::get('/news', 'SchoolController@getTintuc');
	});

	// Giáo viên private
	Route::group(['prefix'=>'teacher', 'middleware'=>['checkLogoutAll','CheckLoginTeacher']], function() {
		Route::get('/', 'TeacherController@getTeacherPri');
		Route::get('/search', 'TeacherController@getTeacherSearch');
		Route::get('/info', 'TeacherController@getTeacherInfo');
		Route::get('/change_password', 'TeacherController@getTeacherChangepassword');
		Route::post('/change_password', 'TeacherController@postTeacherChangepassword');
		Route::get('/update_info', 'TeacherController@getTeacherInfoEdit');
		Route::post('/update_info', 'TeacherController@postTeacherInfoEdit');
		Route::get('add_sv', 'TeacherController@getSV');
		Route::post('/add_sv', 'TeacherController@postSV');
		Route::get('delete_sv/{id}', 'TeacherController@getDeleteSV');
		Route::get('edit_sv/{id}', 'TeacherController@getEditSV');
		Route::post('/edit_sv/{id}', 'TeacherController@postEditSV');
		Route::get('/list_sv', 'TeacherController@getListSV');

		Route::get('/class', 'TeacherController@getClass');
		Route::post('/class', 'TeacherController@postClass');
		Route::get('/class/edit/{id}', 'TeacherController@getEditClass');
		Route::post('/class/edit/{id}', 'TeacherController@postEditClass');
		Route::get('/class/delete/{id}', 'TeacherController@getDeleteClass');
	});

	// Học sinh private
	Route::group(['prefix'=>'student', 'middleware'=>['checkLogoutAll', 'CheckLoginStudent'], 'name'=>'a'], function() {
		Route::get('/', 'StudentController@getTintuyendung');
		Route::get('/info', 'StudentController@getStudentInfo');
		Route::get('/reset_password', 'StudentController@getStudentResetpassword');
		Route::post('/reset_password', 'StudentController@postStudentResetpassword');
		Route::get('/update_info', 'StudentController@getStudentUpdateInfo');
		Route::post('/update_info', 'StudentController@postStudentUpdateInfo');
		Route::get('/update_work', 'StudentController@getStudentUpdateWork');
		Route::post('/update_work', 'StudentController@postStudentUpdateWork');
		Route::get('/cv', 'StudentController@getHoso');
		Route::get('/add_cv', 'StudentController@getHosoAdd');
		Route::post('/add_cv', 'StudentController@postHosoAdd');
		Route::get('/edit_cv/{id}', 'StudentController@getHosoEdit');
		Route::post('/edit_cv/{id}', 'StudentController@postHosoEdit');
		Route::get('/result', 'StudentController@getKetqua');
		Route::get('/result_del/{id}', 'StudentController@getDeleteKetqua');
		Route::get('/tintuyendung', 'StudentController@getTintuyendung');
		Route::post('/tintuyendung', 'StudentController@searchTintuyendung');
		// Route::post('/search', 'StudentController@getTintuyendungSearch');
		Route::get('/search', 'StudentController@getTintuyendungSearch');

		Route::get('/tintuyendung/{id}', 'StudentController@getTintuyendungChitiet');
		Route::post('/tintuyendung/{id}', 'StudentController@postTintuyendungChitiet');
		
		Route::get('/khoadaotao', 'StudentController@getKhoadaotao');
		Route::get('/khoadaotao/{id}', 'StudentController@getKhoadaotaoChitiet');
		Route::post('/khoadaotao/{id}', 'StudentController@postKhoadaotaoChitiet');
		Route::post('/khoadaotao2/{id}', 'StudentController@postKhoadaotaoLuu');
	});
});



//----------------------------------------------------------------------------------------//
//
//------------------------------ADMIN-----------------------------------------------------//
//
// ---------------------------------------------------------------------------------------//

 
Route::group(['namespace'=>'Admin'], function() {
	Route::group(['prefix'=>'login', 'middleware'=>'CheckLogin'], function() {
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');

	});
	Route::get('logout', 'HomeController@getLogout');

	Route::group(['prefix'=>'admin', 'middleware'=>['CheckLogout', 'checkAdmin']], function() {
		// Trang chủ admin
		Route::get('/', 'HomeController@getHome');
		Route::get('home', 'HomeController@getHome');


		// Bài viết
		Route::group(['prefix'=>'baiviet'], function() {

			Route::group(['prefix'=>'tintuc'], function() {
				Route::get('/', 'PostController@getTintuc');
				Route::post('/', 'PostController@postTintuc');

				Route::get('danhsach', 'PostController@getDanhsachTintuc');

				// Route::get('danhsach/{id}', 'PostController@getDanhsachTintuc');
				Route::get('/edit/{id}', 'PostController@getEditTintuc');
				Route::post('/edit/{id}', 'PostController@postEditTintuc');

				Route::get('/delete/{id}', 'PostController@getDeleteTintuc');
			});

			Route::group(['prefix'=>'gioithieu'], function() {
				Route::get('/', 'PostController@getGioithieu');
				Route::post('/', 'PostController@postGioithieu');

				Route::get('/edit/{id}', 'PostController@getEditGioithieu');
				Route::post('/edit/{id}', 'PostController@postEditGioithieu');

				Route::get('/danhsach', 'PostController@getDanhsachGioithieu');
				Route::get('/delete/{id}', 'PostController@getDeleteGioithieu');
			});

			Route::group(['prefix'=>'huongdoanhnghiep'], function() {
				Route::get('/', 'PostController@getHuongdoanhnghiep');
				Route::post('/', 'PostController@postHuongdoanhnghiep');

				Route::get('/edit/{id}', 'PostController@getEditHuongdoanhnghiep');
				Route::post('/edit/{id}', 'PostController@postEditHuongdoanhnghiep');

				Route::get('danhsach', 'PostController@getDanhsachHuongdoanhnghiep');
			});

			Route::group(['prefix'=>'thongtinsinhvien'], function() {
				Route::get('/', 'PostController@getThongtinsinhvien');
				Route::post('/', 'PostController@postThongtinsinhvien');

				Route::get('/edit/{id}', 'PostController@getEditThongtinsinhvien');
				Route::post('/edit/{id}', 'PostController@postEditThongtinsinhvien');

				Route::get('danhsach', 'PostController@getDanhsachThongtinsinhvien');
			});

			Route::group(['prefix'=>'dinhhuongnghe'], function() {
				Route::get('/', 'PostController@getDinhhuongnghe');
				Route::post('/', 'PostController@postDinhhuongnghe');

				Route::get('/edit/{id}', 'PostController@getEditDinhhuongnghe');
				Route::post('/edit/{id}', 'PostController@postEditDinhhuongnghe');

				Route::get('danhsach', 'PostController@getDanhsachDinhhuongnghe');
				Route::get('delete/{id}', 'PostController@getDeleteDinhhuongnghe');
			});

			Route::group(['prefix'=>'jobfair'], function() {
				Route::get('/', 'PostController@getJobfair');
				Route::post('/', 'PostController@postJobfair');

				Route::get('/edit/{id}', 'PostController@getEditJobfair');
				Route::post('/edit/{id}', 'PostController@postEditJobfair');

				Route::get('danhsach', 'PostController@getDanhsachJobfair');
				Route::get('delete/{id}', 'PostController@getDeleteJobFair');
			});
		});


		// Doanh nghiệp
		Route::group(['prefix'=>'doanhnghiep'], function() {
			Route::group(['prefix'=>'thongtin'], function() {
				Route::get('/', 'EnterpriseController@getThongtin');
				Route::post('/', 'EnterpriseController@postThongtin');

				Route::get('/add', 'EnterpriseController@getAddThongtin');
				Route::post('/add', 'EnterpriseController@postAddThongtin');

				Route::get('edit/{id}', 'EnterpriseController@getEditThongtin');
				Route::post('edit/{id}', 'EnterpriseController@postEditThongtin');

				Route::get('delete/{id}', 'EnterpriseController@getDeleteThongtin');
			});

			Route::group(['prefix'=>'taikhoan'], function() {
				Route::get('/', 'EnterpriseController@getTaikhoan');
				Route::post('/', 'EnterpriseController@postTaikhoan');

				Route::get('chitiet/{id}', 'EnterpriseController@getChitiet');

				Route::get('edit/{id}', 'EnterpriseController@getEditTaikhoan');
				Route::post('edit/{id}', 'EnterpriseController@postEditTaikhoan');

				Route::get('delete/{id}', 'EnterpriseController@getDeleteTaikhoan');
				Route::get('delete_all', 'EnterpriseController@getDeleteTaikhoanAll');

				Route::get('get-avatar/{id}','EnterpriseController@getAvatar');
			});
		});

		// Nhà trường
		Route::group(['prefix'=>'nhatruong'], function() {
			Route::group(['prefix'=>'thongtin'], function() {
				Route::get('/', 'SchoolController@getThongtin');
				Route::post('/', 'SchoolController@postThongtin');

				Route::get('edit/{id}', 'SchoolController@getEditThongtin');
				Route::post('edit/{id}', 'SchoolController@postEditThongtin');

				Route::get('delete/{id}', 'SchoolController@getDeleteThongtin');
			});

			Route::group(['prefix'=>'taikhoan'], function() {
				Route::get('/', 'SchoolController@getTaikhoan');
				Route::post('/', 'SchoolController@postTaikhoan');

				Route::get('edit/{id}', 'SchoolController@getEditTaikhoan');
				Route::post('edit/{id}', 'SchoolController@postEditTaikhoan');

				Route::get('delete/{id}', 'SchoolController@getDeleteTaikhoan');
			});
		});

		// Giáo viên
		Route::group(['prefix'=>'giaovien'], function() {
			Route::group(['prefix'=>'thongtin'], function() {
				Route::get('/list', 'TeacherController@getListThongtin');

				Route::get('/', 'TeacherController@getThongtin');
				Route::post('/', 'TeacherController@postThongtin');

				Route::get('edit/{id}', 'TeacherController@getEditThongtin');
				Route::post('edit/{id}', 'TeacherController@postEditThongtin');

				Route::get('delete/{id}', 'TeacherController@getDeleteThongtin');
			});

			Route::group(['prefix'=>'taikhoan'], function() {
				Route::get('/', 'TeacherController@getTaikhoan');
				Route::post('/', 'TeacherController@postTaikhoan');

				Route::get('/edit/{id}', 'TeacherController@getEditTaikhoan');
				Route::post('/edit/{id}', 'TeacherController@postEditTaikhoan');

				Route::get('/delete/{id}', 'TeacherController@getDeleteTaikhoan');

				Route::get('/get-avatar/{id}','TeacherController@getAvatar');
			});
			
		});

		// Sinh viên
		Route::group(['prefix'=>'sinhvien'], function() {
			Route::group(['prefix'=>'thongtin'], function() {
				Route::get('/', 'StudentController@getThongtin');

				Route::get('themmot', 'StudentController@getThemmot');
				Route::post('themmot', 'StudentController@postThemmot');

				Route::get('edit/{id}', 'StudentController@getEditThemmot');
				Route::post('edit/{id}', 'StudentController@postEditThemmot');

				Route::get('delete/{id}', 'StudentController@getDeleteThongtin');

				Route::get('themnhieu', 'StudentController@getThemnhieu');
				Route::post('themnhieu', 'StudentController@postThemnhieu');
			});

			Route::group(['prefix'=>'taikhoan'], function() {
				Route::get('/', 'StudentController@getTaikhoan');
				Route::post('/', 'StudentController@postTaikhoan');

				Route::get('/edit/{id}', 'StudentController@getEditTaikhoan');
				Route::post('/edit/{id}', 'StudentController@postEditTaikhoan');

				Route::get('/reset', 'StudentController@getResetTaikhoan');

				Route::get('/delete/{id}', 'StudentController@getDeleteTaikhoan');
			});
		});

		// Danh mục khác
		Route::group(['prefix'=>'danhmuckhac'], function() {

			// nghề nghiệp
			Route::group(['prefix'=>'nghenghiep'], function() {
				Route::get('/', 'OtherCategoryController@getNghenghiep');
				Route::post('/', 'OtherCategoryController@postNghenghiep');

				Route::get('edit/{id}', 'OtherCategoryController@getEditNghenghiep');
				Route::post('edit/{id}', 'OtherCategoryController@postEditNghenghiep');

				Route::get('/delete/{id}', 'OtherCategoryController@getDeleteNghenghiep');
			});

			// Năm kinh nghiệm
			Route::group(['prefix'=>'namkinhnghiem'], function() {
				Route::get('/', 'OtherCategoryController@getNamkinhnghiem');
				Route::post('/', 'OtherCategoryController@postNamkinhnghiem');

				Route::get('edit/{id}', 'OtherCategoryController@getEditNamkinhnghiem');
				Route::post('edit/{id}', 'OtherCategoryController@postEditNamkinhnghiem');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteNamkinhnghiem');
			});
			
			// Học vấn
			Route::group(['prefix'=>'hocvan'], function() {
				Route::get('/', 'OtherCategoryController@getHocvan');
				Route::post('/', 'OtherCategoryController@postHocvan');

				Route::get('edit/{id}', 'OtherCategoryController@getEditHocvan');
				Route::post('edit/{id}', 'OtherCategoryController@postEditHocvan');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteHocvan');
			});

			// Hình thức
			Route::group(['prefix'=>'hinhthuc'], function() {
				Route::get('/', 'OtherCategoryController@getHinhthuc');
				Route::post('/', 'OtherCategoryController@postHinhthuc');

				Route::get('edit/{id}', 'OtherCategoryController@getEditHinhthuc');
				Route::post('edit/{id}', 'OtherCategoryController@postEditHinhthuc');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteHinhthuc');
			});
			
			// Kĩ năng
			Route::group(['prefix'=>'kinang'], function() {
				Route::get('/', 'OtherCategoryController@getKinang');
				Route::post('/', 'OtherCategoryController@postKinang');

				Route::get('edit/{id}', 'OtherCategoryController@getEditKinang');
				Route::post('edit/{id}', 'OtherCategoryController@postEditKinang');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteKinang');
			});
			
			// Khu vực
			Route::group(['prefix'=>'khuvuc'], function() {
				Route::get('/', 'OtherCategoryController@getKhuvuc');
				Route::post('/', 'OtherCategoryController@postKhuvuc');

				Route::get('edit/{id}', 'OtherCategoryController@getEditKhuvuc');
				Route::post('edit/{id}', 'OtherCategoryController@postEditKhuvuc');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteKhuvuc');
			});

			// Chức vụ
			Route::group(['prefix'=>'chucvu'], function() {
				Route::get('/', 'OtherCategoryController@getChucvu');
				Route::post('/', 'OtherCategoryController@postChucvu');

				Route::get('edit/{id}', 'OtherCategoryController@getEditChucvu');
				Route::post('edit/{id}', 'OtherCategoryController@postEditChucvu');

				Route::get('delete/{id}', 'OtherCategoryController@getDeleteChucvu');
			});

		});

		// Mở rộng
		Route::group(['prefix'=>'morong'], function() {
			// Khoa học
			Route::group(['prefix'=>'khoahoc'], function(){
				Route::get('/', 'WidenController@getKhoahoc');
				Route::post('add', 'WidenController@AddKhoahoc');

				Route::post('edit', 'WidenController@EditKhoahoc');

				Route::post('delete', 'WidenController@DeleteKhoahoc');
			});

			// Khóa
			Route::group(['prefix'=>'khoa'], function() {
				Route::get('/', 'WidenController@getKhoa');
				Route::post('add', 'WidenController@AddKhoa');

				Route::post('edit', 'WidenController@EditKhoa');

				Route::post('delete', 'WidenController@DeleteKhoa');
			});

			// Chuyên ngành
			Route::group(['prefix'=>'chuyennganh'], function() {
				Route::get('/', 'WidenController@getChuyennganh');
				Route::post('add', 'WidenController@AddChuyennganh');

				Route::post('edit', 'WidenController@EditChuyennganh');

				Route::post('delete', 'WidenController@DeleteChuyennganh');
			});
		});
	});
});
