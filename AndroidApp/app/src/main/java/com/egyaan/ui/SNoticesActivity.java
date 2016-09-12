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
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.egyaan.utils.AppConstants;
import com.egyaan.R;
import com.egyaan.utils.CommonTasks;

import java.util.ArrayList;
import java.util.List;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class SNoticesActivity extends AppCompatActivity
        implements NavigationView.OnNavigationItemSelectedListener {

    private static final String TAG = SNoticesActivity.class.getSimpleName();

    private TabLayout tabLayout;
    private ViewPager viewPager;
    private SharedPreferences sharedPreferences;
    private ViewPagerAdapter adapter;
    private ImageView errorImage;
    private TextView errorText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_snotices);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Notices");
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

        tabLayout = (TabLayout) findViewById(R.id.app_bar_notices_tabs);

        final TextView errorTextView = (TextView) this.findViewById(R.id.content_notices_error_textview);
        final ImageView errorImageView = (ImageView) this.findViewById(R.id.content_notices_error_imageview);

        if (CommonTasks.haveNetworkConnection(this)) {
            tabLayout.setVisibility(View.VISIBLE);
            viewPager.setVisibility(View.VISIBLE);

            SNoticesFragment branchFragment = new SNoticesFragment();
            Bundle tempBundle = new Bundle();
            tempBundle.putString("type", "branch");
            branchFragment.setArguments(tempBundle);

            adapter.addFragment(branchFragment, "Branch");

            SNoticesFragment commonFragment = new SNoticesFragment();
            tempBundle = new Bundle();
            tempBundle.putString("type", "common");
            commonFragment.setArguments(tempBundle);

            adapter.addFragment(commonFragment, "Common");

            SNoticesFragment urgentFragment = new SNoticesFragment();
            tempBundle = new Bundle();
            tempBundle.putString("type", "urgent");
            urgentFragment.setArguments(tempBundle);

            adapter.addFragment(urgentFragment, "Urgent");

            viewPager.setAdapter(adapter);
            tabLayout.setupWithViewPager(viewPager);
            errorImageView.setVisibility(View.GONE);
            errorTextView.setVisibility(View.GONE);

        } else {
            tabLayout.setVisibility(View.GONE);
            viewPager.setVisibility(View.GONE);
            errorImageView.setVisibility(View.VISIBLE);
            errorTextView.setVisibility(View.VISIBLE);
            errorTextView.setText("Crap! No Internet Connection");
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
