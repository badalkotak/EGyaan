package com.adityathakker.aditya.egyaan.ui;

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
import android.view.MenuItem;

import com.adityathakker.aditya.egyaan.R;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

public class STimetableActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {
    private TabLayout tabLayout;
    private ViewPager viewPager;
    private ViewPagerAdapter adapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_stimetable);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("TimeTable");
        setSupportActionBar(toolbar);


        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.setDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);


        viewPager = (ViewPager) findViewById(R.id.viewpager);
        adapter = new ViewPagerAdapter(getSupportFragmentManager());

        tabLayout = (TabLayout) findViewById(R.id.app_bar_stimetable_tabs);


        addToViewPager("Monday", adapter);
        addToViewPager("Tuesday", adapter);
        addToViewPager("Wednesday", adapter);
        addToViewPager("Thursday", adapter);
        addToViewPager("Friday", adapter);
        addToViewPager("Saturday", adapter);

        viewPager.setAdapter(adapter);
        tabLayout.setupWithViewPager(viewPager);

        Calendar calendar = Calendar.getInstance();
        int day = calendar.get(Calendar.DAY_OF_WEEK);
        TabLayout.Tab tab;
        switch (day) {
            case Calendar.SUNDAY:
                break;
            case Calendar.MONDAY:
                tab = tabLayout.getTabAt(0);
                tab.select();
                break;
            case Calendar.TUESDAY:
                tab = tabLayout.getTabAt(1);
                tab.select();
                break;
            case Calendar.WEDNESDAY:
                tab = tabLayout.getTabAt(2);
                tab.select();
                break;
            case Calendar.THURSDAY:
                tab = tabLayout.getTabAt(3);
                tab.select();
                break;
            case Calendar.FRIDAY:
                tab = tabLayout.getTabAt(4);
                tab.select();
                break;
            case Calendar.SATURDAY:
                tab = tabLayout.getTabAt(5);
                tab.select();
                break;
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

    private void addToViewPager(String day, ViewPagerAdapter adapter) {
        STimeTableFragment tempFragment = new STimeTableFragment();
        Bundle tempBundle = new Bundle();
        tempBundle.putString("day", day.toLowerCase());
        tempFragment.setArguments(tempBundle);

        adapter.addFragment(tempFragment, day);
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
