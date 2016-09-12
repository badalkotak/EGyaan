package com.adityathakker.aditya.egyaan.model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 7/5/16.
 */
public class GetDoubtsJModel {
    @SerializedName("status")
    private String status;
    @SerializedName("message")
    private String message;
    @SerializedName("doubts")
    private ArrayList<DoubtJModel> doubts;

    public GetDoubtsJModel(String status, String message, ArrayList<DoubtJModel> doubts) {
        this.status = status;
        this.message = message;
        this.doubts = doubts;
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

    public ArrayList<DoubtJModel> getDoubts() {
        return doubts;
    }

    public void setDoubts(ArrayList<DoubtJModel> doubts) {
        this.doubts = doubts;
    }
}
