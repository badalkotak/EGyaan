package com.adityathakker.aditya.egyaan.model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by adityajthakker on 28/4/16.
 */
public class DoubtJModel {
    @SerializedName("id")
    private String id;
    @SerializedName("doubt")
    private String doubt;
    @SerializedName("answer")
    private String answer;
    @SerializedName("student_file")
    private String studentFile;
    @SerializedName("teacher_file")
    private String teacherFile;

    public DoubtJModel(String id, String doubt, String answer, String studentFile, String teacherFile) {
        this.id = id;
        this.doubt = doubt;
        this.teacherFile = teacherFile;
        this.studentFile = studentFile;
        this.answer = answer;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDoubt() {
        return doubt;
    }

    public void setDoubt(String doubt) {
        this.doubt = doubt;
    }

    public String getAnswer() {
        return answer;
    }

    public void setAnswer(String answer) {
        this.answer = answer;
    }

    public String getStudentFile() {
        return studentFile;
    }

    public void setStudentFile(String studentFile) {
        this.studentFile = studentFile;
    }

    public String getTeacherFile() {
        return teacherFile;
    }

    public void setTeacherFile(String teacherFile) {
        this.teacherFile = teacherFile;
    }

    public String toString() {
        return "\nDoubtJModel => " + doubt +
                "\nAnswer => " + answer +
                "\nStudent File => " + studentFile +
                "\nTeacher File => " + teacherFile;
    }

}
