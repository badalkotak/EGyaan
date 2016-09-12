package com.egyaan.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;
/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class TimeSubject {
    @SerializedName("time")
    @Expose
    private String time;
    @SerializedName("subject")
    @Expose
    private String subject;

    public TimeSubject(String time, String subject) {
        this.time = time;
        this.subject = subject;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
    }

    public String getSubject() {
        return subject;
    }

    public void setSubject(String subject) {
        this.subject = subject;
    }
}
