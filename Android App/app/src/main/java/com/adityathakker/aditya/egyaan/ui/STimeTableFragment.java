package com.adityathakker.aditya.egyaan.ui;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.adapters.STimeTableAdapter;
import com.adityathakker.aditya.egyaan.model.TimeTableDBModel;

import java.util.List;

/**
 * Created by adityajthakker on 14/5/16.
 */
public class STimeTableFragment extends Fragment {
    private static final String TAG = STimeTableFragment.class.getSimpleName();
    RecyclerView recyclerView;
    STimeTableAdapter timeTableAdapter;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View fragmentLayout = inflater.inflate(R.layout.stimetable_fragment, container, false);
        Bundle bundle = getArguments();
        String day = null;
        if (bundle != null) {
            day = bundle.getString("day");
        } else {
            Log.d(TAG, "onCreateView: Bundle is Null");
        }

        List<TimeTableDBModel> timeTableDBModelList = TimeTableDBModel.findWithQuery(TimeTableDBModel.class,
                "SELECT * FROM TIME_TABLE_DB_MODEL WHERE day=?", day);

        recyclerView = (RecyclerView) fragmentLayout.findViewById(R.id.stimetable_fragment_recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(getContext()));

        STimeTableAdapter timeTableAdapter = new STimeTableAdapter(getContext(), timeTableDBModelList);

        recyclerView.setAdapter(timeTableAdapter);
        return fragmentLayout;
    }
}
