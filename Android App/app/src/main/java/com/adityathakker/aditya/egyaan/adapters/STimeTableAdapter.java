package com.adityathakker.aditya.egyaan.adapters;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.model.TimeTableDBModel;

import java.util.List;

/**
 * Created by adityajthakker on 14/5/16.
 */

public class STimeTableAdapter extends RecyclerView.Adapter<STimeTableAdapter.STimeTableViewHolder> {
    public static final String TAG = STimeTableAdapter.class.getSimpleName();
    Context context;
    OnItemClickListener clickListener;
    List<TimeTableDBModel> timeSubjectList;

    public STimeTableAdapter(Context context, List<TimeTableDBModel> timeSubjectList) {
        this.context = context;
        this.timeSubjectList = timeSubjectList;
    }

    @Override
    public STimeTableViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.stimetable_row, parent, false);
        STimeTableViewHolder viewHolder = new STimeTableViewHolder(view);
        return viewHolder;
    }

    @Override
    public void onBindViewHolder(STimeTableViewHolder holder, int position) {
        TimeTableDBModel each = timeSubjectList.get(position);
        holder.subject.setText(each.getSubject());
        holder.time.setText(each.getTime());
    }

    @Override
    public int getItemCount() {
        return timeSubjectList.size();
    }

    //Setting up the click listener
    public void setOnItemClickListener(final OnItemClickListener itemClickListener) {
        this.clickListener = itemClickListener;
    }

    //Click Listener Interface
    public interface OnItemClickListener {
        public void onItemClick(View view, int position);
    }

    class STimeTableViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {
        TextView subject, time;

        public STimeTableViewHolder(View itemView) {
            super(itemView);
            subject = (TextView) itemView.findViewById(R.id.stimetable_row_subject);
            time = (TextView) itemView.findViewById(R.id.stimetable_row_time);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            clickListener.onItemClick(v, getAdapterPosition());
        }
    }
}
