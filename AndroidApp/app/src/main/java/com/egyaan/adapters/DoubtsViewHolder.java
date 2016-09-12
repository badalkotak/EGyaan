package com.egyaan.adapters;

import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.egyaan.R;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class DoubtsViewHolder extends RecyclerView.ViewHolder{
    TextView doubt,answer;
    ImageView files;
    public DoubtsViewHolder(View itemView) {
        super(itemView);
        doubt = (TextView) itemView.findViewById(R.id.doubts_fragment_row_doubt_title);
        answer = (TextView) itemView.findViewById(R.id.doubts_fragment_row_answer);
        files = (ImageView) itemView.findViewById(R.id.doubts_fragment_row_file_icon);
    }
}