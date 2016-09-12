package com.egyaan.ui;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.egyaan.R;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class SNoticeDetailActivity extends AppCompatActivity {
    TextView title, desc;
    Button file;
    String fileString, titleString, descString, idString;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_snotice_detail);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Notices");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);


        Bundle bundle = getIntent().getExtras();

        title = (TextView) this.findViewById(R.id.content_notice_detail_notice_title);
        desc = (TextView) this.findViewById(R.id.content_notice_detail_desc);
        file = (Button) this.findViewById(R.id.content_notice_detail_button_file);

        if (bundle != null) {
            idString = bundle.getString("id");
            titleString = bundle.getString("title");
            title.setText(titleString);

            descString = bundle.getString("desc");
            if (descString != null) {
                desc.setText(descString.replace("\\n", "\n").replace("\\r", "\r"));
            }

            fileString = bundle.getString("file");
            if (fileString == null) {
                file.setEnabled(false);
            } else {
                file.setEnabled(true);
                file.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        //startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(fileString)));
                        Toast.makeText(SNoticeDetailActivity.this, "Link Was Clicked", Toast.LENGTH_SHORT).show();
                    }
                });
            }

        }

    }

}
