package com.egyaan.net;


import com.egyaan.model.GetCoursesJModel;
import com.egyaan.model.GetDoubtsJModel;
import com.egyaan.model.GetNoticesJModel;
import com.egyaan.model.GetTimeTableJModel;
import com.egyaan.model.LoginJModel;

import retrofit2.Call;
import retrofit2.http.GET;
import retrofit2.http.Query;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public interface APICalls {
    @GET("loginChecker.php")
    Call<LoginJModel> getLoginStatus(@Query("email") String email, @Query("password") String password);

    @GET("getSubjectDoubts.php")
    Call<GetDoubtsJModel> getSubjectDoubts(@Query("course_id") String courseID);

    @GET("getSubjects.php")
    Call<GetCoursesJModel> getCourses(@Query("semail") String email);

    @GET("viewNotice.php")
    Call<GetNoticesJModel> getNotices(@Query("type") String type);

    @GET("viewUrgentNotice.php")
    Call<GetNoticesJModel> getUrgentNotices();

    @GET("getTimetable.php")
    Call<GetTimeTableJModel> getTimeTable();
}
