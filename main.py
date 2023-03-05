import cv2
import cvzone
import pickle
import numpy as np

#from flask import Flask,render_template

#videofeed
cap = cv2.VideoCapture('carPark.mp4')

with open('CarParkPos', 'rb') as f:
    posList = pickle.load(f)

width, height = 107, 48

def CheckParkingSpace(imgProcessed):
    spaceCounter = 0

    for pos in posList:
        x, y = pos
        #cropping marked slots
        imgCrop = imgProcessed[y:y + height, x:x + width]
        #cv2.imshow(str(x*y), imgCrop)
        #counting pixels
        count = cv2.countNonZero(imgCrop)


        if count < 850:
            color = (0,255,0)
            thickness = 5
            spaceCounter +=1
        else:
            color = (0,0,255)
            thickness = 2

        cv2.rectangle(img, pos, (pos[0] + width, pos[1] + height), color, thickness)
        cvzone.putTextRect(img, str(count), (x,y+height-3), scale=1, thickness=2, offset=0,
                           colorR=color)

    cvzone.putTextRect(img, f'Free:{spaceCounter}/{len(posList)}', (100, 50), scale=2, thickness=2, offset=0,
                       colorR=(0, 200, 0))

while True:
    #loop video
    if cap.get(cv2.CAP_PROP_POS_FRAMES) == cap.get(cv2.CAP_PROP_FRAME_COUNT):
        cap.set(cv2.CAP_PROP_POS_FRAMES, 0)
    success, img = cap.read()

    #convert image to gray image for thresholding
    imgGray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)
    imgBlur = cv2.GaussianBlur(imgGray, (3,3), 1)
    #convert to binary image
    imgThreshold = cv2.adaptiveThreshold(imgBlur,255, cv2.ADAPTIVE_THRESH_GAUSSIAN_C,
                                         cv2.THRESH_BINARY_INV,25,16)
    #removing soft pixel noise
    imgMedian = cv2.medianBlur(imgThreshold,5)
    #Image dilation for thickness
    kernel = np.ones((3,3), np.uint8)
    imgDilate = cv2.dilate(imgMedian, kernel, iterations = 1)


    CheckParkingSpace(imgDilate)

    cv2.imshow("Image", img)
    #cv2.imshow("ImageBlur", imgBlur)
    #cv2.imshow("ImageMEDIAN", imgMedian)
    cv2.waitKey(15)
    #return render_template("nyumbani.html", cv2 = cv2.imshow("Image", img))