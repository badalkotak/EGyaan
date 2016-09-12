package com.egyaan.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class GetTimeTableJModel {
    @SerializedName("monday")
    @Expose
    private List<TimeSubject> monday = new ArrayList<>();
    @SerializedName("tuesday")
    @Expose
    private List<TimeSubject> tuesday = new ArrayList<>();
    @SerializedName("wednesday")
    @Expose
    private List<TimeSubject> wednesday = new ArrayList<>();
    @SerializedName("thursday")
    @Expose
    private List<TimeSubject> thursday = new ArrayList<>();
    @SerializedName("friday")
    @Expose
    private List<TimeSubject> friday = new ArrayList<>();
    @SerializedName("saturday")
    @Expose
    private List<TimeSubject> saturday = new ArrayList<>();

    public GetTimeTableJModel(List<TimeSubject> monday, List<TimeSubject> tuesday, List<TimeSubject> wednesday, List<TimeSubject> thursday, List<TimeSubject> friday, List<TimeSubject> saturday) {
        this.monday = monday;
        this.tuesday = tuesday;
        this.wednesday = wednesday;
        this.thursday = thursday;
        this.friday = friday;
        this.saturday = saturday;
    }

    public List<TimeSubject> getMonday() {
        return monday;
    }

    public void setMonday(List<TimeSubject> monday) {
        this.monday = monday;
    }

    public List<TimeSubject> getTuesday() {
        return tuesday;
    }

    public void setTuesday(List<TimeSubject> tuesday) {
        this.tuesday = tuesday;
    }

    public List<TimeSubject> getWednesday() {
        return wednesday;
    }

    public void setWednesday(List<TimeSubject> wednesday) {
        this.wednesday = wednesday;
    }

    public List<TimeSubject> getThursday() {
        return thursday;
    }

    public void setThursday(List<TimeSubject> thursday) {
        this.thursday = thursday;
    }

    public List<TimeSubject> getFriday() {
        return friday;
    }

    public void setFriday(List<TimeSubject> friday) {
        this.friday = friday;
    }

    public List<TimeSubject> getSaturday() {
        return saturday;
    }

    public void setSaturday(List<TimeSubject> saturday) {
        this.saturday = saturday;
    }
}


