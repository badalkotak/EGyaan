package com.adityathakker.aditya.egyaan.model;

import com.google.gson.annotations.SerializedName;

import java.util.ArrayList;

/**
 * Created by adityajthakker on 7/5/16.
 */
public class GetCoursesJModel {
    @SerializedName("status")
    private String status;
    @SerializedName("message")
    private String message;
    @SerializedName("courses")
    private ArrayList<String> courses;
    @SerializedName("course_ids")
    private ArrayList<String> course_ids;

    public GetCoursesJModel(String status, String message, ArrayList<String> courses, ArrayList<String> course_ids) {
        this.status = status;
        this.message = message;
        this.courses = courses;
        this.course_ids = course_ids;
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

    public ArrayList<String> getCourses() {
        return courses;
    }

    public void setCourses(ArrayList<String> courses) {
        this.courses = courses;
    }

    public ArrayList<String> getCourse_ids() {
        return course_ids;
    }

    public void setCourse_ids(ArrayList<String> course_ids) {
        this.course_ids = course_ids;
    }
}
