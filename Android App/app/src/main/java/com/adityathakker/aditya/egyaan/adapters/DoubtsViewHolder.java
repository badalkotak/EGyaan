package com.adityathakker.aditya.egyaan.adapters;

import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.adityathakker.aditya.egyaan.R;

/**
 * Created by adityajthakker on 28/4/16.
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