package com.egyaan.ui;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.design.widget.TabLayout;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.GravityCompat;
import android.support.v4.view.ViewPager;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.MenuItem;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.egyaan.utils.AppConstants;
import com.egyaan.R;
import com.egyaan.model.GetCoursesJModel;
import com.egyaan.net.APICalls;
import com.egyaan.utils.CommonTasks;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class SDoubtsActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    private static final String TAG = SDoubtsActivity.class.getSimpleName();

    private TabLayout tabLayout;
    private ViewPager viewPager;
    private SharedPreferences sharedPreferences;
    private ViewPagerAdapter adapter;
    private ImageView errorImage;
    private TextView errorText;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sdoubts);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Doubts Section");
        setSupportActionBar(toolbar);

        sharedPreferences = this.getSharedPreferences(AppConstants.SharedPrefs.NAME, MODE_PRIVATE);

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);

        viewPager = (ViewPager) findViewById(R.id.viewpager);
        adapter = new ViewPagerAdapter(getSupportFragmentManager());

        tabLayout = (TabLayout) findViewById(R.id.app_bar_doubts_tabs);

        if(CommonTasks.haveNetworkConnection(this)){
            Retrofit retrofit = new Retrofit.Builder().baseUrl(AppConstants.URLs.BASE_URL).addConverterFactory(GsonConverterFactory.create()).build();


            APICalls getCoursesAPI = retrofit.create(APICalls.class);

            Call<GetCoursesJModel> getCoursesJModelCall = getCoursesAPI.getCourses(sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_EMAIL, null));

            getCoursesJModelCall.enqueue(new Callback<GetCoursesJModel>() {
                @Override
                public void onResponse(Call<GetCoursesJModel> call, Response<GetCoursesJModel> response) {
                    Log.d(TAG, "onResponse: Got Response");
                    ArrayList<String> coursesArrayList = response.body().getCourses();
                    ArrayList<String> courseIds = response.body().getCourse_ids();
                    for (int i = 0; i < coursesArrayList.size(); i++) {
                        String courseName = coursesArrayList.get(i);
                        String courseID = courseIds.get(i);
                        Log.d(TAG, "onResponse: Each Course ID: " + courseName);
                        SDoubtsFragment tempDoubtFragment = new SDoubtsFragment();
                        Bundle tempBundle = new Bundle();
                        tempBundle.putString("doubtsCourseID", courseID);
                        tempDoubtFragment.setArguments(tempBundle);

                        adapter.addFragment(tempDoubtFragment, courseName);
                    }
                    adapter.addFragment(new SDoubtsOfflineFragment(), "Offline");
                    viewPager.setAdapter(adapter);
                    tabLayout.setupWithViewPager(viewPager);
                }

                @Override
                public void onFailure(Call<GetCoursesJModel> call, Throwable t) {
                    Toast.makeText(SDoubtsActivity.this, "Something Went Wrong", Toast.LENGTH_SHORT).show();
                    Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
                }
            });

        }else{

            adapter.addFragment(new SDoubtsOfflineFragment(), "Offline");
            viewPager.setAdapter(adapter);
            tabLayout.setupWithViewPager(viewPager);
        }


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

    class ViewPagerAdapter extends FragmentPagerAdapter {
        private final List<Fragment> mFragmentList = new ArrayList<>();
        private final List<String> mFragmentTitleList = new ArrayList<>();

        public ViewPagerAdapter(FragmentManager manager) {
            super(manager);
        }

        @Override
        public Fragment getItem(int position) {
            return mFragmentList.get(position);
        }

        @Override
        public int getCount() {
            return mFragmentList.size();
        }

        public void addFragment(Fragment fragment, String title) {
            mFragmentList.add(fragment);
            mFragmentTitleList.add(title);
        }

        @Override
        public CharSequence getPageTitle(int position) {
            return mFragmentTitleList.get(position);
        }
    }
}
