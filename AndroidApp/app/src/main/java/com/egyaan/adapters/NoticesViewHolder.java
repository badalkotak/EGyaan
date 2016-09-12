package com.egyaan.adapters;

import android.support.v7.widget.RecyclerView;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.egyaan.R;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
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
