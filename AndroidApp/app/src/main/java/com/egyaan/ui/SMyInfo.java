package com.egyaan.ui;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

import com.egyaan.utils.AppConstants;
import com.egyaan.R;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class SMyInfo extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_smy_info);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);


        TextView sName, pName, sEmail, pEmail, sAddress, sGender, sBranch, pPhone;

        sName = (TextView) this.findViewById(R.id.content_smy_info_sname);
        pName = (TextView) this.findViewById(R.id.content_smy_info_pname);
        sEmail = (TextView) this.findViewById(R.id.content_smy_info_semail);
        pEmail = (TextView) this.findViewById(R.id.content_smy_info_pemail);
        sAddress = (TextView) this.findViewById(R.id.content_smy_info_saddress);
        sGender = (TextView) this.findViewById(R.id.content_smy_info_sgender);
        sBranch = (TextView) this.findViewById(R.id.content_smy_info_sbranch);
        pPhone = (TextView) this.findViewById(R.id.content_smy_info_pnumber);


        SharedPreferences sharedPreferences = getSharedPreferences(AppConstants.SharedPrefs.NAME, MODE_PRIVATE);

        sName.setText("Name: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_FNAME, null) + " " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_LNAME, null));
        pName.setText("Name: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_FNAME, null) + " " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_LNAME, null));
        sEmail.setText("Email: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_EMAIL, null));
        pEmail.setText("Email: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_EMAIL, null));
        sAddress.setText("Address: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_ADDRESS, null));
        if (sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_GENDER, null).equals("M")) {
            sGender.setText("Gender: Male");
        } else {
            sGender.setText("Gender: Female");
        }
        sBranch.setText("Branch: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_BRANCH, null));
        pPhone.setText("Phone: " + sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_MOBILE_NO, null));


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

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.smy_info, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {
        // Handle navigation view item clicks here.
        int id = item.getItemId();

        if (id == R.id.nav_camera) {
            // Handle the camera action
        } else if (id == R.id.nav_gallery) {

        } else if (id == R.id.nav_slideshow) {

        } else if (id == R.id.nav_manage) {

        } else if (id == R.id.nav_share) {

        } else if (id == R.id.nav_send) {

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }
}
