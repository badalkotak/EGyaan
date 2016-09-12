package com.adityathakker.aditya.egyaan.ui;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.adapters.DoubtsAdapter;
import com.adityathakker.aditya.egyaan.database.DatabaseHelper;
import com.adityathakker.aditya.egyaan.model.DoubtJModel;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 1/5/16.
 */
public class SDoubtsOfflineFragment extends Fragment {
    private static final String TAG = SDoubtsOfflineFragment.class.getSimpleName();
    RecyclerView recyclerView;
    DoubtsAdapter doubtsAdapter;

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View fragmentLayout = inflater.inflate(R.layout.sdoubts_fragment, container, false);

        recyclerView = (RecyclerView) fragmentLayout.findViewById(R.id.doubts_fragment_recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(getContext()));

        doubtsAdapter = new DoubtsAdapter(getContext());

        recyclerView.setAdapter(doubtsAdapter);

        TextView errorTextView = (TextView) fragmentLayout.findViewById(R.id.doubts_fragment_error_textview);
        ImageView errorImageView = (ImageView) fragmentLayout.findViewById(R.id.doubts_fragment_error_imageview);

        DatabaseHelper databaseHelper = new DatabaseHelper(getContext());
        ArrayList<DoubtJModel> arrayList = databaseHelper.getAllOfflineDoubts();
        if (arrayList.size() > 0) {
            errorImageView.setVisibility(View.GONE);
            errorTextView.setVisibility(View.GONE);
            recyclerView.setVisibility(View.VISIBLE);

            doubtsAdapter.setDoubtArrayList(arrayList);
            doubtsAdapter.notifyDataSetChanged();
        } else {
            errorImageView.setVisibility(View.VISIBLE);
            errorTextView.setVisibility(View.VISIBLE);
            recyclerView.setVisibility(View.GONE);
            errorTextView.setText("Err! No Data");
        }
        databaseHelper.close();

        return fragmentLayout;
    }
}
