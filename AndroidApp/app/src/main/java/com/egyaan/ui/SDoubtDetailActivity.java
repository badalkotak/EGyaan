package com.egyaan.ui;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.content.res.ResourcesCompat;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.egyaan.R;
import com.egyaan.database.DatabaseHelper;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class SDoubtDetailActivity extends AppCompatActivity {
    TextView doubtTitle, answer;
    Button studentFile, teacherFile;
    String studentFileString, teacherFileString, doubtString, answerString, idString;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_sdoubt_detail);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        toolbar.setTitle("Doubts Section");
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        Bundle bundle = getIntent().getExtras();

        doubtTitle = (TextView) this.findViewById(R.id.content_doubt_detail_doubt_title);
        answer = (TextView) this.findViewById(R.id.content_doubt_detail_question_answer);
        studentFile = (Button) this.findViewById(R.id.content_doubt_detail_button_student_file);
        teacherFile = (Button) this.findViewById(R.id.content_doubt_detail_button_teacher_file);

        if (bundle != null) {
            idString = bundle.getString("id");
            doubtString = bundle.getString("doubt");
            doubtTitle.setText(doubtString);

            answerString = bundle.getString("answer");
            if (answerString != null) {
                answer.setText(bundle.getString("answer").replace("\\n", "\n").replace("\\r", "\r"));
            } else {
                answer.setText("The question hasn't been answered yet.");
            }

            studentFileString = bundle.getString("studentFile");
            teacherFileString = bundle.getString("teacherFile");
            if (studentFileString == null) {
                studentFile.setEnabled(false);
            } else {
                studentFile.setEnabled(true);
                studentFile.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(studentFileString)));
                    }
                });

            }
            if (teacherFileString == null) {
                teacherFile.setEnabled(false);
            } else {
                teacherFile.setEnabled(true);
                teacherFile.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        startActivity(new Intent(Intent.ACTION_VIEW, Uri.parse(teacherFileString)));
                    }
                });

            }

        }


    }

    @Override
    public boolean onPrepareOptionsMenu(Menu menu) {
        DatabaseHelper databaseHelper = new DatabaseHelper(this);
        if (databaseHelper.checkForOfflineDoubt(idString)) {
            menu.findItem(R.id.menu_doubts_details_offline).setIcon(ResourcesCompat.getDrawable(getResources(), R.drawable.ic_delete_white_36dp, null));
        } else {
            menu.findItem(R.id.menu_doubts_details_offline).setIcon(ResourcesCompat.getDrawable(getResources(), R.drawable.ic_offline_pin_white_36dp, null));
        }
        databaseHelper.close();
        return super.onPrepareOptionsMenu(menu);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.doubts_details, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.menu_doubts_details_offline) {
            DatabaseHelper databaseHelper = new DatabaseHelper(this);
            if (databaseHelper.checkForOfflineDoubt(idString)) {
                if (databaseHelper.removeOfflineDoubt(Integer.parseInt(idString))) {
                    Toast.makeText(this, "Removed From Offline Doubts", Toast.LENGTH_SHORT).show();
                    item.setIcon(ResourcesCompat.getDrawable(getResources(), R.drawable.ic_offline_pin_white_36dp, null));
                } else {
                    Toast.makeText(this, "Something Went Wrong", Toast.LENGTH_SHORT).show();
                }

            } else {
                if (databaseHelper.addOfflineDoubt(idString, doubtString, answerString, studentFileString, teacherFileString)) {
                    Toast.makeText(this, "Added To Offline Doubts", Toast.LENGTH_SHORT).show();
                    item.setIcon(ResourcesCompat.getDrawable(getResources(), R.drawable.ic_delete_white_36dp, null));
                } else {
                    Toast.makeText(this, "Something Went Wrong", Toast.LENGTH_SHORT).show();
                }

            }
            databaseHelper.close();


            return true;
        }

        return super.onOptionsItemSelected(item);
    }

}
