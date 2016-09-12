package com.egyaan.adapters;

import android.content.Context;
import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import com.egyaan.R;
import com.egyaan.model.DoubtJModel;
import com.egyaan.ui.SDoubtDetailActivity;

import java.util.ArrayList;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class DoubtsAdapter extends RecyclerView.Adapter<DoubtsViewHolder>{
    private static final String TAG = DoubtsAdapter.class.getSimpleName();
    Context context;
    LayoutInflater layoutInflater;
    ArrayList<DoubtJModel> doubtJModelArrayList;


    public DoubtsAdapter(Context context) {
        this.context = context;
        layoutInflater = LayoutInflater.from(context);
        doubtJModelArrayList = new ArrayList<>();
    }

    public void setDoubtArrayList(ArrayList<DoubtJModel> doubtJModelArrayList){
        this.doubtJModelArrayList = doubtJModelArrayList;
    }

    @Override
    public DoubtsViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        return new DoubtsViewHolder(layoutInflater.inflate(R.layout.sdoubts_fragment_row,parent,false));
    }

    @Override
    public void onBindViewHolder(DoubtsViewHolder holder, int position) {
        final DoubtJModel eachDoubtJModel = doubtJModelArrayList.get(position);
        holder.doubt.setText(eachDoubtJModel.getDoubt());

        String answer = eachDoubtJModel.getAnswer();
        if(answer == null){
            holder.answer.setText("The question hasn't been answered yet.");
        }else{
            holder.answer.setText(answer.replace("\\n", "\n").replace("\\r", "\r"));
        }

        if(eachDoubtJModel.getStudentFile() == null && eachDoubtJModel.getTeacherFile() == null){
            holder.files.setVisibility(View.GONE);
        }else{
            holder.files.setVisibility(View.VISIBLE);
        }

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(context, SDoubtDetailActivity.class);
                intent.putExtra("id",eachDoubtJModel.getId());
                intent.putExtra("doubt", eachDoubtJModel.getDoubt());
                intent.putExtra("answer", eachDoubtJModel.getAnswer());
                intent.putExtra("studentFile", eachDoubtJModel.getStudentFile());
                intent.putExtra("teacherFile", eachDoubtJModel.getTeacherFile());
                context.startActivity(intent);
            }
        });


        Log.d(TAG, "onBindViewHolder: DoubtJModel In RecyclerView" + eachDoubtJModel.toString());
    }

    @Override
    public int getItemCount() {
        return doubtJModelArrayList.size();
    }
}


