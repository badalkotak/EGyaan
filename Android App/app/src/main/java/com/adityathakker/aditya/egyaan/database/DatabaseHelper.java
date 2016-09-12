package com.adityathakker.aditya.egyaan.database;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import com.adityathakker.aditya.egyaan.AppConstants;
import com.adityathakker.aditya.egyaan.model.DoubtJModel;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 1/5/16.
 */
public class DatabaseHelper extends SQLiteOpenHelper {
    private static final int VERSION = 1;
    private static final String TAG = DatabaseHelper.class.getSimpleName();
    private Context context;

    public DatabaseHelper(Context context) {
        super(context, AppConstants.DatabaseConstants.DATABASE_NAME, null, VERSION);
        this.context = context;
    }

    @Override
    public void onCreate(SQLiteDatabase db) {
        db.execSQL(AppConstants.DatabaseConstants.CREATE_OFFLINE_DOUBT_TABLE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
        db.execSQL(AppConstants.DatabaseConstants.DROP_OFFLINE_DOUBT_TABLE);
        onCreate(db);
    }

    public boolean addOfflineDoubt(String id, String doubt, String answer, String studentFile, String teacherFile) {
        SQLiteDatabase db = getWritableDatabase();
        ContentValues contentValues = new ContentValues();
        contentValues.put(AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_ID, Integer.parseInt(id));
        contentValues.put(AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_DOUBT, doubt);
        contentValues.put(AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_ANSWER, answer);
        contentValues.put(AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_STUDENT_FILE, studentFile);
        contentValues.put(AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_TEACHER_FILE, teacherFile);
        long success = db.insert(AppConstants.DatabaseConstants.OFFLINE_DOUBT_TABLE_NAME, null, contentValues);
        db.close();
        if (success == -1) {
            return false;
        } else {
            return true;
        }
    }

    public boolean removeOfflineDoubt(int id) {
        SQLiteDatabase db = getWritableDatabase();
        int success = db.delete(AppConstants.DatabaseConstants.OFFLINE_DOUBT_TABLE_NAME,
                AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_ID + "=?", new String[]{Integer.toString(id)});
        if (success == 0) {
            return false;
        } else {
            return true;
        }
    }

    public ArrayList<DoubtJModel> getAllOfflineDoubts() {
        SQLiteDatabase db = getReadableDatabase();
        Cursor doubtsCursor = db.query(
                AppConstants.DatabaseConstants.OFFLINE_DOUBT_TABLE_NAME,
                null,
                null,
                null,
                null,
                null,
                null,
                null
        );

        ArrayList<DoubtJModel> doubtsArrayList = new ArrayList<>();


        while (doubtsCursor.moveToNext()) {
            Log.d(TAG, "getAllOfflineDoubts: Cursor Move To Next: ");
            String id = doubtsCursor.getString(0);
            String doubt = doubtsCursor.getString(1);
            String answer = doubtsCursor.getString(2);
            String studentFile = doubtsCursor.getString(3);
            String teacherFile = doubtsCursor.getString(4);
            DoubtJModel tempDoubtJModel = new DoubtJModel(id, doubt, answer, studentFile, teacherFile);
            doubtsArrayList.add(tempDoubtJModel);
        }

        return doubtsArrayList;
    }

    public boolean checkForOfflineDoubt(String id) {
        SQLiteDatabase db = getReadableDatabase();
        Cursor doubtsCursor = db.query(
                AppConstants.DatabaseConstants.OFFLINE_DOUBT_TABLE_NAME,
                null,
                AppConstants.DatabaseConstants.OFFLINE_DOUBT_KEY_ID + "=?",
                new String[]{id},
                null,
                null,
                null,
                null
        );
        if (doubtsCursor.moveToFirst()) {
            return true;
        } else {
            return false;
        }

    }
}
