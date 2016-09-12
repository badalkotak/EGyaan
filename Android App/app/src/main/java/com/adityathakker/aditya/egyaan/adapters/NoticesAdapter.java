package com.adityathakker.aditya.egyaan.adapters;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.model.NoticeJModel;
import com.adityathakker.aditya.egyaan.ui.SNoticeDetailActivity;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 8/5/16.
 */
public class NoticesAdapter extends RecyclerView.Adapter<NoticesViewHolder> {
    private static final String TAG = DoubtsAdapter.class.getSimpleName();
    Context context;
    LayoutInflater layoutInflater;
    ArrayList<NoticeJModel> noticeJModelArrayList;

    public NoticesAdapter(Context context) {
        this.context = context;
        layoutInflater = LayoutInflater.from(this.context);
        noticeJModelArrayList = new ArrayList<>();
    }

    public void setNoticeJModelArrayList(ArrayList<NoticeJModel> noticeJModelArrayList) {
        this.noticeJModelArrayList = noticeJModelArrayList;
    }

    @Override
    public NoticesViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        return new NoticesViewHolder(layoutInflater.inflate(R.layout.snotices_fragment_row, parent, false));
    }

    @Override
    public void onBindViewHolder(NoticesViewHolder holder, int position) {
        final NoticeJModel noticeJModel = noticeJModelArrayList.get(position);

        holder.title.setText(noticeJModel.getTitle());

        holder.desc.setText(noticeJModel.getNotice());

        if (noticeJModel.getFile() != null && !noticeJModel.getFile().equals("")) {
            holder.files.setVisibility(View.VISIBLE);
        }

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, SNoticeDetailActivity.class);
                intent.putExtra("id", noticeJModel.getId());
                intent.putExtra("title", noticeJModel.getTitle());
                intent.putExtra("desc", noticeJModel.getNotice());
                intent.putExtra("file", noticeJModel.getFile());
                context.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return noticeJModelArrayList.size();
    }
}
