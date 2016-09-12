package com.adityathakker.aditya.egyaan.ui;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.adityathakker.aditya.egyaan.AppConstants;
import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.adapters.NoticesAdapter;
import com.adityathakker.aditya.egyaan.model.GetNoticesJModel;
import com.adityathakker.aditya.egyaan.model.NoticeJModel;
import com.adityathakker.aditya.egyaan.net.APICalls;

import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * Created by adityajthakker on 8/5/16.
 */
public class SNoticesFragment extends Fragment {

    private static final String TAG = SNoticesFragment.class.getSimpleName();
    SharedPreferences sharedPreferences;
    RecyclerView recyclerView;
    NoticesAdapter noticesAdapter;

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        sharedPreferences = getContext().getSharedPreferences(AppConstants.SharedPrefs.NAME, Context.MODE_PRIVATE);
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View fragmentLayout = inflater.inflate(R.layout.snotices_fragment, container, false);

        recyclerView = (RecyclerView) fragmentLayout.findViewById(R.id.notices_fragment_recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(getContext()));

        noticesAdapter = new NoticesAdapter(getContext());
        recyclerView.setAdapter(noticesAdapter);

        Bundle bundle = getArguments();
        String type = null;
        if (bundle != null) {
            type = bundle.getString("type");
        } else {
            Log.d(TAG, "onCreateView: Bundle is Null");
        }

        final TextView errorTextView = (TextView) fragmentLayout.findViewById(R.id.notices_fragment_error_textview);
        final ImageView errorImageView = (ImageView) fragmentLayout.findViewById(R.id.notices_fragment_error_imageview);


        Retrofit retrofit = new Retrofit.Builder().baseUrl(AppConstants.URLs.BASE_URL).addConverterFactory(GsonConverterFactory.create()).build();
        APICalls apiCalls = retrofit.create(APICalls.class);

        if (type.equals("branch")) {
            Log.d(TAG, "onCreateView: Branch Notice Created");
            Call<GetNoticesJModel> getNoticesJModelCall = apiCalls.getNotices(sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_BRANCH, null));

            getNoticesJModelCall.enqueue(new Callback<GetNoticesJModel>() {
                @Override
                public void onResponse(Call<GetNoticesJModel> call, Response<GetNoticesJModel> response) {
                    GetNoticesJModel getNoticesJModel = response.body();

                    if (getNoticesJModel.getStatus().equals("success")) {
                        ArrayList<NoticeJModel> noticeJModelArrayList = getNoticesJModel.getNotices();
                        if (noticeJModelArrayList.size() > 0) {
                            noticesAdapter.setNoticeJModelArrayList(noticeJModelArrayList);
                            noticesAdapter.notifyDataSetChanged();
                            errorImageView.setVisibility(View.GONE);
                            errorTextView.setVisibility(View.GONE);
                            recyclerView.setVisibility(View.VISIBLE);
                        } else {
                            errorImageView.setVisibility(View.VISIBLE);
                            errorTextView.setVisibility(View.VISIBLE);
                            recyclerView.setVisibility(View.GONE);
                            errorTextView.setText("Err! No Notices Available");
                        }
                    } else {
                        Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                        Log.d(TAG, "onResponse: response has failed");
                    }
                }

                @Override
                public void onFailure(Call<GetNoticesJModel> call, Throwable t) {
                    Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                    Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
                }
            });

        } else if (type.equals("common")) {
            Log.d(TAG, "onCreateView: Commom Notice Created");
            Call<GetNoticesJModel> getNoticesJModelCall = apiCalls.getNotices("common");

            getNoticesJModelCall.enqueue(new Callback<GetNoticesJModel>() {
                @Override
                public void onResponse(Call<GetNoticesJModel> call, Response<GetNoticesJModel> response) {
                    GetNoticesJModel getNoticesJModel = response.body();

                    if (getNoticesJModel.getStatus().equals("success")) {
                        ArrayList<NoticeJModel> noticeJModelArrayList = getNoticesJModel.getNotices();
                        if (noticeJModelArrayList.size() > 0) {
                            noticesAdapter.setNoticeJModelArrayList(noticeJModelArrayList);
                            noticesAdapter.notifyDataSetChanged();
                            errorImageView.setVisibility(View.GONE);
                            errorTextView.setVisibility(View.GONE);
                            recyclerView.setVisibility(View.VISIBLE);
                        } else {
                            errorImageView.setVisibility(View.VISIBLE);
                            errorTextView.setVisibility(View.VISIBLE);
                            recyclerView.setVisibility(View.GONE);
                            errorTextView.setText("Err! No Notices Available");
                        }
                    } else {
                        Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                        Log.d(TAG, "onResponse: response has failed");
                    }
                }

                @Override
                public void onFailure(Call<GetNoticesJModel> call, Throwable t) {
                    Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                    Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
                }
            });
        } else {
            Log.d(TAG, "onCreateView: Urgent Notice Created");
            Call<GetNoticesJModel> getNoticesJModelCall = apiCalls.getUrgentNotices();

            getNoticesJModelCall.enqueue(new Callback<GetNoticesJModel>() {
                @Override
                public void onResponse(Call<GetNoticesJModel> call, Response<GetNoticesJModel> response) {
                    GetNoticesJModel getNoticesJModel = response.body();

                    if (getNoticesJModel.getStatus().equals("success")) {
                        ArrayList<NoticeJModel> noticeJModelArrayList = getNoticesJModel.getNotices();
                        if (noticeJModelArrayList.size() > 0) {
                            noticesAdapter.setNoticeJModelArrayList(noticeJModelArrayList);
                            noticesAdapter.notifyDataSetChanged();
                            errorImageView.setVisibility(View.GONE);
                            errorTextView.setVisibility(View.GONE);
                            recyclerView.setVisibility(View.VISIBLE);
                        } else {
                            errorImageView.setVisibility(View.VISIBLE);
                            errorTextView.setVisibility(View.VISIBLE);
                            recyclerView.setVisibility(View.GONE);
                            errorTextView.setText("Err! No Notices Available");
                        }
                    } else {
                        Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                        Log.d(TAG, "onResponse: response has failed");
                    }
                }

                @Override
                public void onFailure(Call<GetNoticesJModel> call, Throwable t) {
                    Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                    Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
                }
            });
        }

        return fragmentLayout;
    }
}
