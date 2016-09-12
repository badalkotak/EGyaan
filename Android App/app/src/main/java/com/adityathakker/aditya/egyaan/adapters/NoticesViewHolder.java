package com.adityathakker.aditya.egyaan.adapters;

import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.adityathakker.aditya.egyaan.R;

/**
 * Created by adityajthakker on 8/5/16.
 */
public class NoticesViewHolder extends RecyclerView.ViewHolder {
    TextView title, desc;
    ImageView files;

    public NoticesViewHolder(View itemView) {
        super(itemView);
        title = (TextView) itemView.findViewById(R.id.notices_fragment_row_notice_title);
        desc = (TextView) itemView.findViewById(R.id.notices_fragment_row_desc);
        files = (ImageView) itemView.findViewById(R.id.notices_fragment_row_file_icon);
    }
}
