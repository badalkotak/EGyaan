package com.adityathakker.aditya.egyaan.model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 8/5/16.
 */
public class GetNoticesJModel {
    @SerializedName("status")
    private String status;
    @SerializedName("message")
    private String message;
    @SerializedName("notices")
    private ArrayList<NoticeJModel> notices;

    public GetNoticesJModel(String status, String message, ArrayList<NoticeJModel> notices) {
        this.status = status;
        this.message = message;
        this.notices = notices;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public ArrayList<NoticeJModel> getNotices() {
        return notices;
    }

    public void setNotices(ArrayList<NoticeJModel> notices) {
        this.notices = notices;
    }
}
