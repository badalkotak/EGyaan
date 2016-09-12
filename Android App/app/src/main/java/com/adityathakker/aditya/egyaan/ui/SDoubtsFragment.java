package com.adityathakker.aditya.egyaan.ui;

import android.os.Bundle;
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
import com.adityathakker.aditya.egyaan.adapters.DoubtsAdapter;
import com.adityathakker.aditya.egyaan.model.GetDoubtsJModel;
import com.adityathakker.aditya.egyaan.net.APICalls;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

/**
 * Created by adityajthakker on 28/4/16.
 */
public class SDoubtsFragment extends Fragment {
    private static final String TAG = SDoubtsFragment.class.getSimpleName();
    RecyclerView recyclerView;
    DoubtsAdapter doubtsAdapter;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View fragmentLayout = inflater.inflate(R.layout.sdoubts_fragment, container, false);

        Bundle bundle = getArguments();
        String doubtsCourseID = null;
        if (bundle != null) {
            doubtsCourseID = bundle.getString("doubtsCourseID");
        } else {
            Log.d(TAG, "onCreateView: Bundle is Null");
        }

        final TextView errorTextView = (TextView) fragmentLayout.findViewById(R.id.doubts_fragment_error_textview);
        final ImageView errorImageView = (ImageView) fragmentLayout.findViewById(R.id.doubts_fragment_error_imageview);

        Retrofit retrofit = new Retrofit.Builder().baseUrl(AppConstants.URLs.BASE_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        APICalls getDoubtsAPI = retrofit.create(APICalls.class);

        Call<GetDoubtsJModel> getDoubtsJModelCall = getDoubtsAPI.getSubjectDoubts(doubtsCourseID);

        getDoubtsJModelCall.enqueue(new Callback<GetDoubtsJModel>() {
            @Override
            public void onResponse(Call<GetDoubtsJModel> call, Response<GetDoubtsJModel> response) {
                if (response.body().getDoubts().size() > 0) {
                    errorImageView.setVisibility(View.GONE);
                    errorTextView.setVisibility(View.GONE);
                    recyclerView.setVisibility(View.VISIBLE);

                    doubtsAdapter.setDoubtArrayList(response.body().getDoubts());
                    doubtsAdapter.notifyDataSetChanged();
                } else {
                    errorImageView.setVisibility(View.VISIBLE);
                    errorTextView.setVisibility(View.VISIBLE);
                    recyclerView.setVisibility(View.GONE);
                    errorTextView.setText("Err! No Data");
                }


            }

            @Override
            public void onFailure(Call<GetDoubtsJModel> call, Throwable t) {
                Toast.makeText(getContext(), "Something Went Wrong", Toast.LENGTH_SHORT).show();
                Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
            }
        });


        recyclerView = (RecyclerView) fragmentLayout.findViewById(R.id.doubts_fragment_recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(getContext()));

        doubtsAdapter = new DoubtsAdapter(getContext());

        recyclerView.setAdapter(doubtsAdapter);

        // Inflate the layout for this fragment
        return fragmentLayout;
    }

}
