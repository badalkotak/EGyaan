package com.adityathakker.aditya.egyaan.ui;

import android.app.ProgressDialog;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.adityathakker.aditya.egyaan.AppConstants;
import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.model.GetTimeTableJModel;
import com.adityathakker.aditya.egyaan.model.TimeSubject;
import com.adityathakker.aditya.egyaan.model.TimeTableDBModel;
import com.adityathakker.aditya.egyaan.net.APICalls;
import com.orm.SugarContext;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class StudentHomeActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener, View.OnClickListener{

    SharedPreferences sharedPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        SugarContext.init(StudentHomeActivity.this);
        setContentView(R.layout.activity_student_home);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        sharedPreferences = this.getSharedPreferences(AppConstants.SharedPrefs.NAME, MODE_PRIVATE);

        if (sharedPreferences.getBoolean(AppConstants.SharedPrefs.IS_FIRST_TIME_STARTED, true)) {
            //Do something on first start
            final ProgressDialog progressDialog = new ProgressDialog(this);
            progressDialog.setIndeterminate(true);
            progressDialog.setMessage("Getting Timetable...");
            progressDialog.show();

            Retrofit retrofit = new Retrofit.Builder().baseUrl(AppConstants.URLs.BASE_URL).addConverterFactory(GsonConverterFactory.create()).build();
            APICalls apiCalls = retrofit.create(APICalls.class);

            Call<GetTimeTableJModel> timeTableJModelCall = apiCalls.getTimeTable();
            timeTableJModelCall.enqueue(new Callback<GetTimeTableJModel>() {
                @Override
                public void onResponse(Call<GetTimeTableJModel> call, Response<GetTimeTableJModel> response) {
                    GetTimeTableJModel getTimeTableJModel = response.body();
                    populateTimeTable(getTimeTableJModel, progressDialog);

                    //Committing Changes
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.putBoolean(AppConstants.SharedPrefs.IS_FIRST_TIME_STARTED, false);
                    editor.commit();
                }

                @Override
                public void onFailure(Call<GetTimeTableJModel> call, Throwable t) {
                    Toast.makeText(StudentHomeActivity.this, "Something Went Wrong", Toast.LENGTH_SHORT).show();
                }
            });


        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);



        View headerView = navigationView.getHeaderView(0);
        TextView navName, navEmail;
        navName = (TextView) headerView.findViewById(R.id.nav_header_student_home_name);
        navEmail = (TextView) headerView.findViewById(R.id.nav_header_student_home_email);

        String studentName = sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_FNAME, null)
                + " " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_LNAME, null);
        navName.setText(studentName);
        String studentEmail = sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_EMAIL, null);
        navEmail.setText(studentEmail);

        Button doubtsButton = (Button) this.findViewById(R.id.content_student_home_button_doubts);
        doubtsButton.setOnClickListener(this);

        Button noticesButton = (Button) this.findViewById(R.id.content_student_home_button_notices);
        noticesButton.setOnClickListener(this);

        Button timetablebutton = (Button) this.findViewById(R.id.content_student_home_button_timetable);
        timetablebutton.setOnClickListener(this);

        Button meButton = (Button) this.findViewById(R.id.content_student_home_button_me);
        meButton.setOnClickListener(this);

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }



    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        switch (id){
            case R.id.nav_student_home_logout:
                SharedPreferences.Editor editor = sharedPreferences.edit();
                editor.putBoolean(AppConstants.SharedPrefs.ALREADY_LOGGEN_IN, false);
                editor.commit();
                editor = null;
                startActivity(new Intent(StudentHomeActivity.this,LoginActivity.class));
                finish();
        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    @Override
    public void onClick(View v) {
        switch (v.getId()){
            case R.id.content_student_home_button_doubts:
                startActivity(new Intent(this, SDoubtsActivity.class));
                break;
            case R.id.content_student_home_button_notices:
                startActivity(new Intent(this, SNoticesActivity.class));
                break;
            case R.id.content_student_home_button_timetable:
                startActivity(new Intent(this, STimetableActivity.class));
                break;
            case R.id.content_student_home_button_me:
                startActivity(new Intent(this, SMyInfo.class));
                break;
        }
    }

    private void populateTimeTable(final GetTimeTableJModel getTimeTableJModel, final ProgressDialog progressDialog) {
        new Thread() {
            @Override
            public void run() {
                List<TimeSubject> monday = getTimeTableJModel.getMonday();
                for (TimeSubject each : monday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "monday");
                    temp.save();
                }

                List<TimeSubject> tuesday = getTimeTableJModel.getTuesday();
                for (TimeSubject each : tuesday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "tuesday");
                    temp.save();
                }

                List<TimeSubject> wednesday = getTimeTableJModel.getWednesday();
                for (TimeSubject each : wednesday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "wednesday");
                    temp.save();
                }

                List<TimeSubject> thursday = getTimeTableJModel.getThursday();
                for (TimeSubject each : thursday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "thursday");
                    temp.save();
                }

                List<TimeSubject> friday = getTimeTableJModel.getFriday();
                for (TimeSubject each : friday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "friday");
                    temp.save();
                }

                List<TimeSubject> saturday = getTimeTableJModel.getSaturday();
                for (TimeSubject each : saturday) {
                    TimeTableDBModel temp = new TimeTableDBModel(each.getTime(), each.getSubject(), "saturday");
                    temp.save();
                }

                progressDialog.dismiss();
            }
        }.start();
    }
}
