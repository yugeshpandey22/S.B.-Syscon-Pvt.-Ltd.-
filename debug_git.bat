@echo off
echo --- STATUS --- > git_debug.txt
git status >> git_debug.txt 2>&1
echo --- REMOTE --- >> git_debug.txt
git remote -v >> git_debug.txt 2>&1
echo --- LOG --- >> git_debug.txt
git log -n 1 >> git_debug.txt 2>&1
echo --- PUSH --- >> git_debug.txt
git push origin main >> git_debug.txt 2>&1
