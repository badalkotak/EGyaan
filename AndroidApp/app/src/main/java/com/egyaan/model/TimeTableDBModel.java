package com.egyaan.model;

import com.orm.SugarRecord;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class TimeTableDBModel extends SugarRecord {
    String time, subject, day;

    public TimeTableDBModel() {
    }

    public TimeTableDBModel(String time, String subject, String day) {
        this.time = time;
        this.subject = subject;
        this.day = day;
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

    public String getDay() {
        return day;
    }

    public void setDay(String day) {
        this.day = day;
    }
}
